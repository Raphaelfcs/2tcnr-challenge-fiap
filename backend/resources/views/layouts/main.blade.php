<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors | {{ $tittle ?? '' }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @yield('styles')
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="/img/logo.png">
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                @include('layouts.sidebar')
            </div>
        </aside>
        <main>
            @yield('body')
        </main>
        <div class="right">
        <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                {{--            <div class="theme-toggler">--}}
                {{--                <span class="material-icons-sharp active">light_mode</span>--}}
                {{--                <span class="material-icons-sharp">dark_mode</span>--}}
                {{--            </div>--}}
                <div class="profile">
                    <div class="info">
                        <p>Olá, <b>{{ auth()->user()->name }}</b></p>
                        <small class="text-muted">{{ auth()->user()->planDescription() }}</small>
                    </div>
                    <div class="profile-photo">
                        <img src="/img/profile.jpg">
                    </div>
                </div>
        </div>

        @if(!auth()->user()->admin())
            <div class="recent-updates">
                <h2>Central de Notificação</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/img/profile2.jpg">
                        </div>
                        <div class="message">
                            <p><b>Roberto</b> gostaria de negociar o valor de compra do seu HB20.</p>
                            <small class="text-muted">2 Horas Atrás</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/img/profile3.jpg">
                        </div>
                        <div class="message">
                            <p><b>Carla</b> acabou de alugar o seu Honda HR-V.</p>
                            <small class="text-muted">3 Horas Atrás</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="/img/profile4.jpg">
                        </div>
                        <div class="message">
                            <p><b>Júlia</b> acabou de comprar o seu Honda Civic Si.</p>
                            <small class="text-muted">10 Horas Atrás</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sales-analytics">
            <h2>Seus Produtos</h2>
            <div class="item online">
                <div class="icon">
                    <span class="material-icons-sharp">saved_search</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>MONITORAMENTO AVANÇADO</h3>
                        <small class="text-muted">2 anos</small>
                    </div>
                    <h5 class="success"></h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item offline">
                <div class="icon">
                    <span class="material-icons-sharp">support_agent</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>SUPORTE BUSINESS</h3>
                        <small class="text-muted">1 ano</small>
                    </div>
                    <h5 class="danger"></h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item customers">
                <div class="icon">
                    <span class="material-icons-sharp">verified_user</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>SEGURANÇA VEICULAR</h3>
                        <small class="text-muted">1 ano</small>
                    </div>
                    <h5 class="success"></h5>
                    <h3></h3>
                </div>
            </div>
            <div class="item add-product">
                <div>
                    <span class="material-icons-sharp">add</span>
                    <h3>Adquirir novos serviços</h3>
                </div>
            </div>
        </div>
        @endif

        <script src="/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        @if(session()->has('success'))
            <script>
                iziToast.success({
                    title: 'Sucesso',
                    message: '{{ session('success') }}',
                    position: 'topRight',
                });
            </script>
        @endif
        @yield('scripts')
    </body>
</html>
