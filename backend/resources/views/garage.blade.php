<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/garage.css">
    <title>Webmonitors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<header>
    <a href="../index.html" class="logo"><img src="../img/logo.png" alt=""></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="{{ route('dashboard') }}">Início</a></li>
        <li><a href="../index.html#ride">Serviços</a></li>
        <li><a href="../planos/plano.html">Planos</a></li>
        <li><a href="{{ route('garage') }}">Garagem</a></li>
        <li><a href="../index.html#reviews">Sobre</a></li>
        <li><a href="../index.html#reviews">Opiniões</a></li>
    </ul>
    <div class="header-btn">
        <a href="/register" class="sign-up">Cadastre-se</a>
        <a href="/login" class="sign-in">Entrar</a>
    </div>
</header>

<section class="section featured-car" id="featured-car">
    <div class="container">

        <div class="title-wrapper">
            <h2 class="h2 section-title">Garagem</h2>

            <a href="#" class="featured-car-link">
                <span>Veja mais</span>

                <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
        </div>

        <ul class="featured-car-list">

            @foreach($cars as $car)
                <li>
                    <div class="featured-car-card">

                        <figure class="card-banner">
                            <img src="{{ $car->imagem_path }}" alt="{{ $car->modelo }}" loading="lazy" width="440" height="300"
                                 class="w-100">
                        </figure>

                        <div class="card-content">

                            <div class="card-title-wrapper">
                                <h3 class="h3 card-title">
                                    <a href="#">{{ $car->modelo }}</a>
                                </h3>

                                <data class="year" value="{{ $car->ano }}">{{ $car->ano }}</data>
                            </div>

                            <ul class="card-list">

                                <li class="card-list-item">
                                    <ion-icon name="people-outline"></ion-icon>

                                    <span class="card-item-text">{{ $car->combustivel }}</span>
                                </li>

                                <li class="card-list-item">
                                    <ion-icon name="flash-outline"></ion-icon>

                                    <span class="card-item-text">{{ $car->cambio }}</span>
                                </li>

                            </ul>

                            <div class="card-price-wrapper">

                                <p class="card-price">
                                    <strong>R${{ $car->preco }}</strong> @if($car->modalidade == 1) / dia @endif
                                </p>

                                <button class="btn fav-btn" aria-label="Add to favourite list">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>

                                <button class="btn" onclick="location.href = '{{ route('showCar', $car) }}'">{{ $car->getModalidadeCliente() }}</button>

                            </div>

                        </div>

                    </div>
                </li>
            @endforeach

        </ul>

    </div>
</section>

<script src="https://unpkg.com/scrollreveal"></script>
<!-- Link To JS -->
<script src="../main.js"></script>
</body>

</html>
