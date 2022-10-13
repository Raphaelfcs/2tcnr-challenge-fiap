<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/payment.css">

</head>
<body>

<div class="container">

    <form action="" method="POST">
        @csrf

        <h3 class="title" style="margin-bottom: 20px">{{ $car->getModalidadeCliente() }} carro: {{ $car->modelo }} - {{ $car->ano }} por R${{ $car->preco }} @if($car->modalidade == 1) / dia @endif</h3>
        <div class="row">

            <div class="col">

                <h3 class="title">Endereço de Cobrança</h3>

                <div class="inputBox">
                    <span>Nome completo:</span>
                    <input type="text" placeholder="" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="text" placeholder="" name="email" required>
                </div>
                <div class="inputBox">
                    <span>Endereço:</span>
                    <input type="text" placeholder="" name="address" required>
                </div>
                <div class="inputBox">
                    <span>Cidade:</span>
                    <input type="text" placeholder="" name="city" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Estado:</span>
                        <input type="text" placeholder="" name="state" required>
                    </div>
                    <div class="inputBox">
                        <span>CEP:</span>
                        <input type="text" placeholder="" name="cep" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Pagamento</h3>

                <div class="inputBox">
                    <span>Cartões aceito:</span>
                    <img src="/img/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Nome no cartão:</span>
                    <input type="text" placeholder="" name="card_name" required>
                </div>
                <div class="inputBox">
                    <span>Número do cartão:</span>
                    <input type="number" placeholder="" name="number" required>
                </div>
                <div class="inputBox">
                    <span>Mês:</span>
                    <input type="number" placeholder="" name="month" required>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Ano:</span>
                        <input type="number" placeholder="" name="year" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV:</span>
                        <input type="number" placeholder="" name="cvv" required>
                    </div>
                </div>

            </div>

        </div>

        <input type="button" style="width: calc(50% - 2.15px); background-color: #c0c0c0" onclick="history.back()" value="Voltar" class="submit-btn">
        <input type="submit" style="width: calc(50% - 2.15px)" value="Confirmar pagamento" class="submit-btn">

    </form>

</div>

</body>
</html>
