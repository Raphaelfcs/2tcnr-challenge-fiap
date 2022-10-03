data "aws_vpc" "vpc" {
  filter {
    name   = "tag:Name"
    values = ["cloudit-acquire-sandbox"]
  }
}

data "aws_subnet_ids" "private" {
  vpc_id = data.aws_vpc.vpc.id
  filter {
    name   = "tag:Name"
    values = ["cloudit-acquire-app*"]
  }
}

data "aws_eks_cluster" "cluster" {
  name = module.eks.cluster_id
}

data "aws_eks_cluster_auth" "cluster" {
  name = module.eks.cluster_id
}

provider "kubernetes" {
  host                   = data.aws_eks_cluster.cluster.endpoint
  cluster_ca_certificate = base64decode(data.aws_eks_cluster.cluster.certificate_authority.0.data)
  token                  = data.aws_eks_cluster_auth.cluster.token
  load_config_file       = false
  version                = "~> 1.11"
}

module "eks" {
  source          = "../../module_terraform/aws-engine-eks/"
  cluster_name    = local.name_cluster
  subnets         = data.aws_subnet_ids.private.ids
  vpc_id          = data.aws_vpc.vpc.id
  map_roles       = local.map_roles
  manage_aws_auth = true
  cluster_enabled_log_types       = ["api", "audit", "authenticator", "controllerManager", "scheduler"]
  cluster_version                 = "1.21"
  cluster_endpoint_private_access = false
  cluster_endpoint_public_access  = true
  worker_groups = [
    {
      instance_type        = "%{if local.env == "prod" || local.env == "stress-test"}${local.AWS_TYPE_INSTANCE}%{else}t3a.medium%{endif}"
      asg_max_size         = "%{if local.env == "prod" || local.env == "stress-test"}${local.DMAXEKS}%{else}1%{endif}"
      asg_desired_capacity = "%{if local.env == "prod" || local.env == "stress-test"}${local.DMIN}%{else}1%{endif}"
      kubelet_extra_args   = local.kubelet_extra_args_node_tools
      key_name             = local.key_name

    },
    {
      instance_type        = "%{if local.env == "prod" || local.env == "stress-test"}${local.AWS_TYPE_INSTANCE}%{else}t3a.medium%{endif}"
      asg_max_size         = "%{if local.env == "prod" || local.env == "stress-test"}${local.DMAXEKS}%{else}1%{endif}"
      asg_desired_capacity = "%{if local.env == "prod" || local.env == "stress-test"}${local.DMIN}%{else}1%{endif}"
      kubelet_extra_args   = local.kubelet_extra_args_node_app
      key_name             = local.key_name

    }
  ]
  tags = local.tags
}

module "start-stop-node-dmz" {
  source                      = "../../module_terraform/aws-engine-schedule-start-stop/"
  env                         = local.env
  scheduled_action_name_start = local.scheduled_action_name_start_tools
  scheduled_action_name_stop  = local.scheduled_action_name_stop_tools
  recurrence_start            = local.recurrence_start_tools
  recurrence_stop             = local.recurrence_stop_tools
  autoscaling_group_name      = module.eks.NAME-AUTOSCALING[0]
}

module "start-stop-node-app" {
  source                      = "../../module_terraform/aws-engine-schedule-start-stop/"
  env                         = local.env
  scheduled_action_name_start = local.scheduled_action_name_start_app
  scheduled_action_name_stop  = local.scheduled_action_name_stop_app
  recurrence_start            = local.recurrence_start_app
  recurrence_stop             = local.recurrence_stop_app
  autoscaling_group_name      = module.eks.NAME-AUTOSCALING[1]
}