<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
    <!-- Link To CSS -->
    <link rel="stylesheet" href="/css/panel.css">
    <!-- Box Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
<!-- Header -->
<header>
    <a href="/" class="logo"><img src="../img/logo.png" alt=""></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="/">Início</a></li>
        <li><a href="/#ride">Serviços</a></li>
        <li><a href="/plans">Planos</a></li>
        <li><a href="/garage">Garagem</a></li>
        <li><a href="/#reviews">Sobre</a></li>
        <li><a href="/#reviews">Opiniões</a></li>
    </ul>
    <div class="header-btn">
        @if(auth()->check())
            <a href="/dashboard" class="sign-in">Dashboard</a>
        @else
            <a href="/register" class="sign-up">Cadastre-se</a>
            <a href="/login" class="sign-in">Entrar</a>
        @endif
    </div>
</header>
<main class="main">
    <section class="home section" id="home">
        <div class="battery__card">
            <div class="battery__data">
                <p class="battery__text">Confiabilidade do veículo</p>
                <h1 class="battery__percentage">
                    Muito Bom
                </h1>
            </div>
            <div class="battery__pill">
                <div class="battery__level">
                    <div class="battery__liquid"></div>
                </div>
            </div>
        </div>
        <div class="form-container">
            <form action="">
                <h3 style="width: 100%">R${{ $car->preco }} @if($car->modalidade == 1) / dia @else / á vista @endif</h3>
                <a href="{{ route('actionCar', $car) }}" class="btn">{{ $car->getModalidadeCliente() }} carro</a>
            </form>
        </div>
        <div class="shape shape__big"></div>
        <div class="shape shape__small"></div>
        <div class="home__container container grid">
            <div class="home__data">
                <h1 class="home__title">
                    Painel de informações do veículo
                </h1>

                <h2 class="home__subtitle">
                    {{ $car->modelo }} - {{ $car->ano }}
                </h2>

                <h3 class="home__elec">
                    <i class="ri-medal-2-line"></i> Carro Verificado
                </h3>
            </div>

            <img src="{{ $car->imagem_path }}" alt="" class="home__img">

            <div class="home__car">
                <div class="home__car-data">
                    <div class="home__car-icon">
                        <i class="ri-temp-cold-line"></i>
                    </div>
                    <h2 class="home__car-number">24°</h2>
                    <h3 class="home__car-name">TEMPERATURA</h3>
                </div>

                <div class="home__car-data">
                    <div class="home__car-icon">
                        <i class="ri-dashboard-3-line"></i>
                    </div>
                    <h2 class="home__car-number">873</h2>
                    <h3 class="home__car-name">QUILOMETRAGEM</h3>
                </div>

                <div class="home__car-data">
                    <div class="home__car-icon">
                        <i class="ri-flashlight-fill"></i>
                    </div>
                    <h2 class="home__car-number">94%</h2>
                    <h3 class="home__car-name">BATERIA</h3>
                </div>
            </div>

            <a href="{{ route('showCarInfo', $car) }}" class="home__button">INFO</a>
        </div>
    </section>
</main>


<script src="https://unpkg.com/scrollreveal"></script>
<!-- Link To JS -->
<script src="../main.js"></script>
</body>
</html>
