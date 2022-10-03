# nat gw
resource "aws_eip" "this-eip" {
  vpc = true
  tags = var.tags
  lifecycle {
    create_before_destroy = true
  }
}

resource "aws_nat_gateway" "this-nat-gw" {
  allocation_id = aws_eip.this-eip.id
  subnet_id     = aws_subnet.primary-dmz-0.id
  depends_on = [
    aws_internet_gateway.this_igw_vpc
  ]
  tags = var.tags

  lifecycle {
    create_before_destroy = true
  }
}