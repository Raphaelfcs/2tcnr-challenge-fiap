eksctl utils associate-iam-oidc-provider \
    --region us-east-1 \
    --cluster clouditvpc-acquire-sandbox \
    --approve


    aws eks update-kubeconfig --name clouditvpc-acquire-sandbox


eksctl create iamserviceaccount \
  --cluster clouditvpc-acquire-sandbox \
  --namespace kube-system \
  --name aws-load-balancer-controller \
  --attach-policy-arn arn:aws:iam::$786623674405:policy/AWSLoadBalancerControllerIAMPolicy \
  --override-existing-serviceaccounts \
  --approve


  kubectl apply -k "github.com/aws/eks-charts/stable/aws-load-balancer-controller/crds?ref=master"


https://docs.aws.amazon.com/pt_br/AmazonCloudWatch/latest/monitoring/ContainerInsights-Prometheus-Sample-Workloads-nginx.htmlß