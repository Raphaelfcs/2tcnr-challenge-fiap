<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
    <link rel="stylesheet" href="/css/pendingAnalysis.css">
</head>
<body>
<div class="popup">
    <img src="/img/correct.png">
    <h2>Análise enviada!</h2>
    <p>Iremos analisar as informações repassadas e entraremos em contato.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            <button type="button" onclick="location.href = '/'">Voltar</button>
        </a>
    </form>
</div>
</body>
</html>
