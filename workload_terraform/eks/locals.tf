locals {
  tags = {
    Name   = "clouditvpc-acquire-sandbox${replace(basename(path.cwd), "_", "-")}"
    Terraform                                           = true
    APP                                                 = "cloudit"
    Projeto                                             = "cloudit"
    Requerente                                          = "cloudit"
    Ambiente                                            = "sandbox"
    Ec2StopTime                                         = "OverNight01"
    Ec2StartTime                                        = "OverDay03"
    "kubernetes.io/cluster/clouditvpc-acquire-sandbox" = "shared"
  }

  map_roles = [
      {
          rolearn  = "arn:aws:iam::786623674405:role/eks_full"
          username = "eks_full"
          groups   = ["system:masters"]
      },
      {
          rolearn  = "arn:aws:iam::786623674405:role/eks_full"
          username = "eks_full"
          groups   = ["system:masters"]
      },
  ]
  env = "sandbox"
  AWS_TYPE_INSTANCE = "t3.2xlarge"
  name_cluster = "clouditvpc-acquire-sandbox"
  kubelet_extra_args_node_app = "--node-labels=app=cliente"
  kubelet_extra_args_node_tools = "--node-labels=dmz=cluster"
  namespace = "eks-cloudit-sandbox"
  key_name = "eks-cloudit-sandbox"
  scheduled_action_name_start_tools = "start-tools-eks-sandbox"
  scheduled_action_name_stop_tools = "stop-tools-eks-sandbox"
  scheduled_action_name_start_app = "start-app-eks-sandbox"
  scheduled_action_name_stop_app = "stop-app-eks-sandbox"
  recurrence_start_tools = "0 16 * * *"
  recurrence_stop_tools = "0 00 * * *"
  recurrence_start_app = "0 16 * * *"
  recurrence_stop_app = "0 00 * * *"
  DMAXEKS = "2"
  DMIN = "1"
}