locals {
  name   = "cloudit${replace(basename(path.cwd), "_", "-")}"
  region = "us-east-1"
  env = "sandbox"
  app = "acquire"
  projeto = "cloudit-acquire"
  eks_name = "sharered"
  requerente = "Raphael"
}

module vpc-cloudit {
  source = "../../module_terraform/vpc/"
  name_vpc = "${local.name}-${local.env}"
  cidr_vpc = "12.10.0.0/16"
  instance_tenancy = "default"
  enable_dns_support = true
  enable_dns_hostnames = true
  enable_classiclink = false
  cidr_bloc_0_dmz = "12.10.4.0/22"
  cidr_bloc_1_dmz = "12.10.8.0/21"
  cidr_bloc_2_dmz = "12.10.16.0/20"
  cidr_bloc_0_app = "12.10.32.0/19"
  cidr_bloc_1_app = "12.10.64.0/18"
  cidr_bloc_2_app = "12.10.128.0/17"
  tags = {
    Name                             = local.name 
    Terraform                        = true
    Environment                      = local.env
    APP                              = local.app
    Projeto                          = local.projeto
    Requerente                       = local.requerente
    "kubernetes.io/cluster/${local.name}-acquire-${local.env}" =  local.eks_name
    "kubernetes.io/role/internal-elb"                      = "1"
  }
  env = local.env
  app  = local.app
  projeto = local.projeto
  requerente = local.requerente
  cluster_name = "acquire"
  eks_name = "shared"
  name = local.name

}
#${var.name}-${var.cluster_name}-${var.env}" =  var.eks_name