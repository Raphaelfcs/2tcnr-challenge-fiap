<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="/css/plans.css">

    <title>Webmonitors</title>
</head>
<body>
<section class="card container grid">
    <form action="" method="POST">
        @csrf
        <div class="card__container grid">
        <!--==================== CARD 1 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">GRATUITO</span>
                </div>
                <span class="card__pricing-month"></span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="../img/free-coin.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">Plano Grátis</span>
                <h1 class="card__header-title">Básico</h1>
            </header>

            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Cadastro de veículos ilimitado</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Suporte via e-mail ou chatbot</p>
                </li>
            </ul>

            <button class="card__button" name="plan" value="0">Escolher este plano</button>
        </article>

        <!--==================== CARD 2 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">R$</span>100
                </div>
                <span class="card__pricing-month">/mês</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="../img/pro-coin.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">Plano individual</span>
                <h1 class="card__header-title">Pessoal</h1>
            </header>

            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Monitoramento avançado individual</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Cadastro de veículos ilimitado</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Suporte de Segunda a Sexta das 09h às 18h</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Segurança individual para seus veículos alugados</p>
                </li>
            </ul>

            <button class="card__button" name="plan" value="1">Escolher este plano</button>
        </article>

        <!--==================== CARD 3 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">A DEFINIR</span>
                </div>
                <span class="card__pricing-month"></span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <img src="../img/enterprise-coin.png" alt="" class="card__header-img">
                </div>

                <span class="card__header-subtitle">Plano empresarial</span>
                <h1 class="card__header-title">Empresa</h1>
            </header>

            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Monitoramento avançado completo</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Cadastro de veículos ilimitado</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Suporte 24/7 com nossos especialistas</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Segurança completa para seus veículos alugados</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Relatório de todas suas atividades</p>
                </li>
            </ul>

            <button class="card__button" type="submit" name="plan" value="2">Enviar para análise</button>
        </article>
    </div>
    </form>
</section>
</body>
</html>
