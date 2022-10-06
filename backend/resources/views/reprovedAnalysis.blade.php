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
    <img src="/img/incorrect.png">
    <h2>Análise recusada!</h2>
    <p>Sua solicitação foi recusada, entre em contato com o suporte para maiores informações!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            <button type="button" onclick="location.href = '/'">Sair</button>
        </a>
    </form>
</div>
</body>
</html>
