<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css">
    <title>Webmonitors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
</head>
<body>
<header>
    <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>

    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
        <li><a href="/#home">Início</a></li>
        <li><a href="/#ride">Serviços</a></li>
        <li><a href="../planos/plano.html">Planos</a></li>
        <li><a href="../garage/garage.html">Garagem</a></li>
        <li><a href="../index.html#reviews">Sobre</a></li>
        <li><a href="../index.html#reviews">Opiniões</a></li>
    </ul>
</header>
<section class="area-login">
    <div class="login">
        <div>
            <img src="/img/logo.png">
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}" autofocus>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
            <input type="password" name="password" placeholder="Senha">
            <input type="password" name="password_confirmation" placeholder="Confirme a senha">
            <input type="submit" value="Cadastrar">
        </form>
        <p>Já tem uma conta?<a href="/login">Acesse agora</a></p>
    </div>
</section>

<script src="https://unpkg.com/scrollreveal"></script>
<!-- Link To JS -->
<script src="/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>
@if($errors->any())
    <script>
        @foreach($errors->all() as $error)
        iziToast.error({
            title: 'Error',
            message: '{{ $error }}',
            position: 'topRight',
        });
        @endforeach
    </script>
@endif
</body>

</html>
