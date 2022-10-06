<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
    <!-- Link To CSS -->
    <link rel="stylesheet" href="/css/info.css">
    <!-- Box Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<!-- Header -->
<header>
    <a href="../index.html" class="logo"><img src="../img/logo.png" alt=""></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="../index.html#home">Início</a></li>
        <li><a href="../index.html#ride">Serviços</a></li>
        <li><a href="../planos/plano.html">Planos</a></li>
        <li><a href="../garage/garage.html">Garagem</a></li>
        <li><a href="../index.html#reviews">Sobre</a></li>
        <li><a href="../index.html#reviews">Opiniões</a></li>
    </ul>
    <div class="header-btn">
        <a href="../cadastro/cadastro.html" class="sign-up">Cadastre-se</a>
        <a href="../login/login.html" class="sign-in">Entrar</a>
    </div>
</header>

<a href="{{ route('showCarInfo', $car) }}">Voltar</a>
<section class="specs">
    <div>
        <div class="specs-header">
            <h2>Especificações Técnicas</h2>
            <span></span>
        </div>
        <ul>
            <li>
                <span>Cilindrada do motor</span>
                <span>5204</span>
            </li>
            <li>
                <span>Força máxima</span>
                <span>601.4bhp @ 8250 rpm</span>
            </li>
            <li>
                <span>Torque máximo</span>
                <span>560 Nm @ 6500 rpm</span>
            </li>
            <li>
                <span>KM</span>
                <span>23.493KM</span>
            </li>
            <li>
                <span>Nº de cilindros</span>
                <span>10</span>
            </li>
        </ul>
    </div>
</section>

<section class="car-stats">
    <div class="car">
        <div class="circle">
            <img src="{{ $car->imagem_path }}" alt="car">
        </div>
    </div>
</section>


<script src="https://unpkg.com/scrollreveal"></script>
<!-- Link To JS -->
<script src="../main.js"></script>
</body>
</html>
