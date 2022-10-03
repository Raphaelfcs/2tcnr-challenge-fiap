resource "aws_route_table" "this-route-dmz" {
  vpc_id = aws_vpc.this_vpc.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.this_igw_vpc.id
  }

  tags = var.tags
}

resource "aws_route_table_association" "this-route-dmz-0" {
  subnet_id      = aws_subnet.primary-dmz-0.id
  route_table_id = aws_route_table.this-route-dmz.id
}

resource "aws_route_table_association" "this-route-dmz-1" {
  subnet_id      = aws_subnet.primary-dmz-1.id
  route_table_id = aws_route_table.this-route-dmz.id
}

resource "aws_route_table_association" "this-route-dmz-2" {
  subnet_id      = aws_subnet.primary-dmz-2.id
  route_table_id = aws_route_table.this-route-dmz.id
}
