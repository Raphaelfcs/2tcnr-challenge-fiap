<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
    <link rel="icon" href="/img/icon.png">
    <!-- Link To CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<!-- Header -->
<header>
    <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="/">Início</a></li>
        <li><a href="#ride">Serviços</a></li>
        <li><a href="{{ route('plans') }}">Planos</a></li>
        <li><a href="{{ route('garage') }}">Garagem</a></li>
        <li><a href="#about">Sobre</a></li>
        <li><a href="#reviews">Opiniões</a></li>
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
<!-- Home -->
<section class="home" id="home">
    <div class="text">
        <h1><span>Veículos</span> monitorados<br>e totalmente seguro</h1>
        <p>Aqui você encontra os carros mais bem avaliados no mercado.</p>
        <div class="app-stores">
            <img src="/img/ios.png" alt="">
            <img src="/img/play.png" alt="">
        </div>
    </div>

    <div class="form-container">
        <form action="">
            <div class="input-box">
                <span>Localização</span>
                <input type="search" name="" id="" placeholder="Procure a localização">
            </div>
            <div class="input-box">
                <span>Data de Retirada</span>
                <input type="date" name="" id="">
            </div>
            <div class="input-box">
                <span>Data de Retorno</span>
                <input type="date" name="" id="">
            </div>
            <input type="submit" name="" id="" class="btn" value="Pesquisar">
        </form>
    </div>
</section>
<!-- Ride -->
<section class="ride" id="ride">
    <div class="heading">
        <span>Serviços</span>
        <h1>Alugue, Compre ou Loque seu carro</h1>
    </div>
    <div class="ride-container">
        <div class="box">
            <i class='bx bxs-car'></i>
            <h2>Alugue</h2>
            <p>Aqui fazemos a ponte entre stakeholders. Alugamos carros dos nossos clientes para que você possar curtir seu momento de lazer.</p>
        </div>

        <div class="box">
            <i class='bx bx-money-withdraw' ></i>
            <h2>Compra</h2>
            <p>Se você preferir temos anúncios de compras de automóveis, e o melhor todos eles tem a garantia Webmonitors de qualidade. Utilizamos tecnologias de inteligência artificial para monitorar os veículos a todo momento.</p>
        </div>

        <div class="box">
            <i class='bx bxs-car-garage'></i>
            <h2>Locar</h2>
            <p>Se seu carro está parado e você quer fazer uma graninha extra. Loque seu carro em nosso sistema e ative nosso serviço de monitoramento para que assim você saiba tudo que está acontecendo com seu carro em tempo real.</p>
        </div>
    </div>
</section>
@if($cars->count() > 0)
    <!-- Services -->
    <section class="services" id="services">
    <div class="heading">
        <span>Web List</span>
        <h1>Explore os carros mais bem avaliados</h1>
    </div>
    <div class="services-container">
        @foreach($cars as $car)
            <div class="box">
                <div class="box-img">
                    <img src="{{ $car->imagem_path }}" alt="">
                </div>
                <p>{{ $car->ano }}</p>
                <h3>{{ $car->modelo }}</h3>
                <h2>R${{ $car->preco }} @if($car->modalidade == 1)<span>/dia</span>@endif | 38000 <span>/km</span></h2>
                <a href="{{ route('showCar', $car) }}" class="btn">{{ $car->getModalidadeCliente() }}</a>
            </div>
        @endforeach

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car2.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2020</p>--}}
{{--            <h3>Honda HR-V</h3>--}}
{{--            <h2>R$780 <span>/dia</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel2.html" class="btn">Alugar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car3.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2023</p>--}}
{{--            <h3>Renault Kwid</h3>--}}
{{--            <h2>R$64.190 <span>/à vista</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel3.html" class="btn">Comprar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car4.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2020</p>--}}
{{--            <h3>T-Cross</h3>--}}
{{--            <h2>R$720 <span>/dia</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel4.html" class="btn">Alugar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car5.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2020</p>--}}
{{--            <h3>Nissan Kicks</h3>--}}
{{--            <h2>R$800 <span>/dia</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel5.html" class="btn">Alugar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car6.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2020</p>--}}
{{--            <h3>Chevrolet Onix</h3>--}}
{{--            <h2>R$380 <span>/dia</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel6.html" class="btn">Alugar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car7.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2021</p>--}}
{{--            <h3>Jeep Compass</h3>--}}
{{--            <h2>R$215.900 <span>/à vista</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel7.html" class="btn">Comprar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car8.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2021</p>--}}
{{--            <h3>BMW X1</h3>--}}
{{--            <h2>R$1.600 <span>/dia</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel8.html" class="btn">Alugar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car9.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2018</p>--}}
{{--            <h3>HB20</h3>--}}
{{--            <h2>R$48.900 <span>/à vista</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel9.html" class="btn">Comprar</a>--}}
{{--        </div>--}}

{{--        <div class="box">--}}
{{--            <div class="box-img">--}}
{{--                <img src="/img/car10.jpg" alt="">--}}
{{--            </div>--}}
{{--            <p>2021</p>--}}
{{--            <h3>Tiggo 7</h3>--}}
{{--            <h2>R$1.200 <span>/dia</span> | 38000 <span>/km</span></h2>--}}
{{--            <a href="panel/panel10.html" class="btn">Alugar</a>--}}
{{--        </div>--}}
    </div>
</section>
@endif
<!-- About -->
<section class="about" id="about">
    <div class="heading">
        <span>Sobre Nós</span>
        <h1>Garantindo a melhor experiência para nossos stakeholders.</h1>
    </div>
    <div class="about-container">
        <div class="about-img">
            <img src="img/about.png" alt="">
        </div>
        <div class="about-text">
            <span>Sobre Nós</span>
            <p>Somos uma startup de tecnologia voltada para ambientes de nuvem. Trabalhamos com soluções, produtos e consultorias de negócios com tecnologia em Cloud computing. Nosso propósito é utilizar da tecnologia para criar novas soluções/produtos que sejam mais eficazes, sustentáveis, automatizado e econômico.</p>
            <p>Buscamos ajudar nos negócios dos nossos clientes que estão se transformando digitalmente. Sendo assim, utilizamos as melhores tecnologias disponíveis no mercado atual para que nosso cliente consiga alcançar seus objetivos.</p>
            <a href="about/about.html" class="btn">Saiba mais</a>
        </div>
    </div>
</section>
<!-- Reviews -->
<section class="reviews" id="reviews">
    <div class="heading">
        <span>Opiniões</span>
        <h1>O que nossos clientes dizem</h1>
    </div>
    <div class="reviews-container">
        <div class="box">
            <div class="rev-img">
                <img src="img/rev1.jpg" alt="">
            </div>
            <h2>Priscila Ferreira</h2>
            <div class="stars">
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star-half' ></i>
            </div>
            <p>Adorei o sistema de monitoramento deles. Agora consigo fazer uma renda extra com meu carro e ainda sei como deixei e como recebi.</p>
        </div>

        <div class="box">
            <div class="rev-img">
                <img src="img/rev2.jpg" alt="">
            </div>
            <h2>Afonso Pereira</h2>
            <div class="stars">
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
            </div>
            <p>Comprei meu carro no sistema deles e achei incrível. Estou tendo uma ótima experiência com meu novo carro e sei todo o histórico dele, o que garante a confiabilidade no veículo.</p>
        </div>

        <div class="box">
            <div class="rev-img">
                <img src="img/rev3.jpg" alt="">
            </div>
            <h2>Hugo Ribeiro</h2>
            <div class="stars">
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
                <i class='bx bxs-star' ></i>
            </div>
            <p>Loquei meu veículos com eles e posso garantir que o sistema de monitoramento deles é realmente muito bom!! Agora consigo monitorar as métricas do meu carro e ainda saber como ele está sendo utilizado.</p>
        </div>
    </div>
</section>
<!-- NewsLetter -->
<section class="newsletter">
    <h2>Inscreva-se na nossa Newsletter</h2>
    <div class="box">
        <input type="text" placeholder="Digite o seu email...">
        <a href="#" class="btn">Inscreva-se</a>
    </div>
</section>
<div class="copyright">
    <p>&#169; CloudIt Todos Direitos Reservados</p>
    <div class="social">
        <a href="#"><i class='bx bxl-facebook' ></i></a>
        <a href="#"><i class='bx bxl-twitter' ></i></a>
        <a href="#"><i class='bx bxl-instagram' ></i></a>
    </div>
</div>

<!-- ScrollReveal -->
<script src="https://unpkg.com/scrollreveal"></script>

<!-- Link To JS -->
<script src="main.js"></script>
</body>
</html>
