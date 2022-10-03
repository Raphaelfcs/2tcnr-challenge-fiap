#VARS-TAGS

variable "tags" {
  description = "A map of tags to add to all resources"
  type        = map(string)
  default     = {}
}

variable "env" {type = string}
variable "app" {type = string}
variable "projeto" {type = string}
variable "requerente" {type = string}
variable "cluster_name" {type = string}
variable "eks_name" {type = string}
variable "name"{ type = string}

#VARS-VPC
variable "name_vpc" { type = string }
variable "cidr_vpc" { type = string }
variable "instance_tenancy" { type = string }
variable "enable_dns_support" { type = bool }
variable "enable_dns_hostnames" { type = bool }
variable "enable_classiclink" { type = bool }


#VARS-SUBNET-DMZ
variable "cidr_bloc_0_dmz" { type = string }
variable "cidr_bloc_1_dmz" { type = string }
variable "cidr_bloc_2_dmz" { type = string }

#VARS-SUBNET-APP
variable "cidr_bloc_0_app" { type = string }
variable "cidr_bloc_1_app" { type = string }
variable "cidr_bloc_2_app" { type = string }