    ########################################################

                 ### !!! LEMBRETES !!! ###

###     1- Fazer o upload dos arquivos no s3 via console            ###
###     2- Anexar a police de lab nas instâncias do ec2             ###
###     3- Rodar o último comando do script (s3 cp) nas instâncias  ###

    ########################################################

terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 3.0"
    }
  }
}

# Region
provider "aws" {
  region = "us-east-1"
}

# VPC
resource "aws_vpc" "vpc_webmonitors" {
  cidr_block           = "20.20.0.0/16"
  enable_dns_hostnames = true

  tags = {
    "Name" = "vpc_webmonitors"
  }
}

# Internet Gateway
resource "aws_internet_gateway" "igw_vpcwebmonitors" {
  vpc_id = aws_vpc.vpc_webmonitors.id

  tags = {
    "Name" = "igw_vpcwebmonitors"
  }
}

# Subnet's
resource "aws_subnet" "sn_vpcwebmonitors_pub_1a" {
  vpc_id                  = aws_vpc.vpc_webmonitors.id
  cidr_block              = "20.20.1.0/24"
  map_public_ip_on_launch = true
  availability_zone       = "us-east-1a"

  tags = {
    "Name" = "sn_vpcwebmonitors_pub_1a"
  }
}

resource "aws_subnet" "sn_vpcwebmonitors_pub_1c" {
  vpc_id                  = aws_vpc.vpc_webmonitors.id
  cidr_block              = "20.20.2.0/24"
  map_public_ip_on_launch = true
  availability_zone       = "us-east-1c"

  tags = {
    "Name" = "sn_vpcwebmonitors_pub_1c"
  }
}

resource "aws_subnet" "sn_vpcwebmonitors_priv_1a" {
  vpc_id            = aws_vpc.vpc_webmonitors.id
  cidr_block        = "20.20.3.0/24"
  availability_zone = "us-east-1a"

  tags = {
    "Name" = "sn_vpcwebmonitors_priv_1a"
  }
}

resource "aws_subnet" "sn_vpcwebmonitors_priv_1c" {
  vpc_id            = aws_vpc.vpc_webmonitors.id
  cidr_block        = "20.20.4.0/24"
  availability_zone = "us-east-1c"

  tags = {
    "Name" = "sn_vpcwebmonitors_priv_1c"
  }
}

# Elastic IP
resource "aws_eip" "eip_1" {
  depends_on = [aws_internet_gateway.igw_vpcwebmonitors]
  vpc        = true

  tags = {
    "Name" = "eip_pub_1a"
  }
}

resource "aws_eip" "eip_2" {
  depends_on = [aws_internet_gateway.igw_vpcwebmonitors]
  vpc        = true

  tags = {
    "Name" = "eip_pub_1c"
  }
}

# NAT Gateway
resource "aws_nat_gateway" "ngw_pub_1" {
  allocation_id = aws_eip.eip_1.id
  subnet_id     = aws_subnet.sn_vpcwebmonitors_pub_1a.id
  depends_on    = [aws_internet_gateway.igw_vpcwebmonitors]

  tags = {
    "Name" = "ngw_pub_1"
  }
}

resource "aws_nat_gateway" "ngw_pub_2" {
  allocation_id = aws_eip.eip_2.id
  subnet_id     = aws_subnet.sn_vpcwebmonitors_pub_1c.id
  depends_on    = [aws_internet_gateway.igw_vpcwebmonitors]

  tags = {
    "Name" = "ngw_pub_2"
  }
}

# Route Table
resource "aws_route_table" "rt_pub" {
  vpc_id = aws_vpc.vpc_webmonitors.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.igw_vpcwebmonitors.id
  }

  tags = {
    "Name" = "rt_pub_1a"
  }
}

resource "aws_route_table" "rt_pub_1c" {
  vpc_id = aws_vpc.vpc_webmonitors.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.igw_vpcwebmonitors.id
  }

  tags = {
    "Name" = "rt_pub_1c"
  }
}

resource "aws_route_table" "rt_priv_1a" {
  vpc_id = aws_vpc.vpc_webmonitors.id

  route {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_nat_gateway.ngw_pub_1.id
  }

  tags = {
    "Name" = "rt_priv_1a"
  }
}

resource "aws_route_table" "rt_priv_1c" {
  vpc_id = aws_vpc.vpc_webmonitors.id

  route {
    cidr_block     = "0.0.0.0/0"
    nat_gateway_id = aws_nat_gateway.ngw_pub_2.id
  }

  tags = {
    "Name" = "rt_priv_1c"
  }
}

# Associando a route table
resource "aws_route_table_association" "rta_pub_1a" {
  subnet_id      = aws_subnet.sn_vpcwebmonitors_pub_1a.id
  route_table_id = aws_route_table.rt_pub.id
}

resource "aws_route_table_association" "rta_pub_1c" {
  subnet_id      = aws_subnet.sn_vpcwebmonitors_pub_1c.id
  route_table_id = aws_route_table.rt_pub_1c.id
}

resource "aws_route_table_association" "rta_priv_1a" {
  subnet_id      = aws_subnet.sn_vpcwebmonitors_priv_1a.id
  route_table_id = aws_route_table.rt_priv_1a.id
}

resource "aws_route_table_association" "rta_priv_1c" {
  subnet_id      = aws_subnet.sn_vpcwebmonitors_priv_1c.id
  route_table_id = aws_route_table.rt_priv_1c.id
}

# S3
resource "aws_s3_bucket" "s3webmonitorscloudit" {
  bucket = "s3webmonitorscloudit"
  acl    = "public-read"
}

# Security Group
resource "aws_security_group" "asg_ws" {
  name        = "sg_instance"
  description = "Security Group das instancias EC2"
  vpc_id      = aws_vpc.vpc_webmonitors.id

  egress {
    description = "All to All"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = ""
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = [aws_vpc.vpc_webmonitors.cidr_block]
  }

  ingress {
    description = "TCP/22 from All"
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = "TCP/80 from All"
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = [aws_vpc.vpc_webmonitors.cidr_block]
  }

  tags = {
    "Name" = "asg_ws"
  }
}

resource "aws_security_group" "asg_elb" {
  name        = "sg_elb"
  description = "Security Group Load Balancer"
  vpc_id      = aws_vpc.vpc_webmonitors.id

  egress {
    description = "All to All"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = ""
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["20.20.0.0/16"]
  }

  ingress {
    description = "TCP/22 from All"
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = "TCP/80 from All"
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = {
    "Name" = "asg_elb"
  }
}

resource "aws_security_group" "asg_rds" {
  name        = "sg_rds"
  description = "Security Group dos bancos de dados"
  vpc_id      = aws_vpc.vpc_webmonitors.id

  egress {
    description = "All to all"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    description = "Liberando entrada das EC2 Webserver"
    from_port   = 3306
    to_port     = 3306
    protocol    = "tcp"
    cidr_blocks = ["20.20.1.0/24", "20.20.2.0/24"]
  }

  ingress {
    description = "All from 10.0.0.0/16"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = {
    "Name" = "asg_rds"
  }
}

resource "aws_instance" "ws_1" {
  ami                    = "ami-05fa00d4c63e32376"
  instance_type          = "t2.micro"
  subnet_id              = aws_subnet.sn_vpcwebmonitors_pub_1a.id
  vpc_security_group_ids = [aws_security_group.asg_ws.id]
  user_data              = <<-EOF
#!/bin/bash
yum update -y
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd mariadb-server 
sudo systemctl start httpd 
sudo systemctl enable httpd
sudo systemctl is-enabled httpd 
sudo aws s3 cp s3://s3webmonitorscloudit --region us-east-1 /var/www/html/ --recursive

EOF

  tags = {
    "Name" = "ws_1"
  }
}

resource "aws_instance" "ws_2" {
  ami                    = "ami-05fa00d4c63e32376"
  instance_type          = "t2.micro"
  subnet_id              = aws_subnet.sn_vpcwebmonitors_pub_1c.id
  vpc_security_group_ids = [aws_security_group.asg_ws.id]
  user_data              = <<-EOF
#!/bin/bash
yum update -y
amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
yum install -y httpd mariadb-server 
sudo systemctl start httpd 
sudo systemctl enable httpd
sudo systemctl is-enabled httpd 
sudo aws s3 cp s3://s3webmonitorscloudit --region us-east-1 /var/www/html/ --recursive

EOF

  tags = {
    "Name" = "ws_2"
  }
}

# Elastic Load Balancer
resource "aws_elb" "elb_ws" {
  name    = "elb-ws"
  subnets = [aws_subnet.sn_vpcwebmonitors_pub_1a.id, aws_subnet.sn_vpcwebmonitors_pub_1c.id]
  security_groups = [aws_security_group.asg_elb.id]

  listener {
    instance_port     = 80
    instance_protocol = "http"
    lb_port           = 80
    lb_protocol       = "http"
  }

  instances = [aws_instance.ws_1.id, aws_instance.ws_2.id]

  tags = {
    "Name" = "elb_ws"
  }
}

# Definindo o DB Subnet Group do Banco de dados
resource "aws_db_subnet_group" "sn_group" {
  name = "subnet_group"
  subnet_ids = [aws_subnet.sn_vpcwebmonitors_priv_1a.id, aws_subnet.sn_vpcwebmonitors_priv_1c.id]

  tags = {
    "Name" = "sn_group_db"
  }
}

# Definindo o Parameter Group
resource "aws_db_parameter_group" "parameter_group" {
  name = "parameter-group"
  family = "mysql8.0"

  parameter {
    name = "character_set_server"
    value = "utf8"
  }
}

# Criando a instância rds
resource "aws_db_instance" "db_webmonitors" {
  identifier = "dbwebmonitors"
  engine = "mysql"
  engine_version = "8.0.23"
  instance_class = "db.t2.micro"
  storage_type = "gp2"
  allocated_storage = 20
  max_allocated_storage = 0
  monitoring_interval = 0
  multi_az = true
  name = "db_webmonitors"
  username = "admin"
  password = "webmonitors"
  skip_final_snapshot = true
  db_subnet_group_name = aws_db_subnet_group.sn_group.name
  parameter_group_name = aws_db_parameter_group.parameter_group.name
  vpc_security_group_ids = [aws_security_group.asg_rds.id]

  tags = {
    "Name" = "db_webmonitors"
  }
}

