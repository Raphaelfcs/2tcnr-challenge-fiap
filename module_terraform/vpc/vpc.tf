# Internet VPC
resource "aws_vpc" "this_vpc" {
  cidr_block           = var.cidr_vpc
  instance_tenancy     = var.instance_tenancy
  enable_dns_support   = var.enable_dns_support
  enable_dns_hostnames = var.enable_dns_hostnames
  enable_classiclink   = var.enable_classiclink
 tags = {
    Name                             = "${var.projeto}-${var.env}" 
    Terraform                        = true
    Environment                      = var.env
    APP                              = var.app
    Projeto                          = var.projeto
    Requerente                       = var.requerente
    "kubernetes.io/cluster/${var.name}-${var.cluster_name}-${var.env}" =  "${var.eks_name}"
    "kubernetes.io/role/internal-elb"                      = "1"
  }
}
