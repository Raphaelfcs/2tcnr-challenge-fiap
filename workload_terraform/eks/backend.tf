terraform {
  backend "s3" {
    bucket = "iac-cloudit-labs"
    key    = "fiap/2tcnr/webm/eks-demo"
    region = "us-east-1"
    encrypt = true
  }
}