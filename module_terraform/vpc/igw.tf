
# Internet GW
resource "aws_internet_gateway" "this_igw_vpc" {
  vpc_id = aws_vpc.this_vpc.id

  tags = var.tags
}