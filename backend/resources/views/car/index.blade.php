<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/css/cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
</head>
<body>
<div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="../img/logo.png">
            </div>
            <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
            </div>
        </div>
        <div class="sidebar">
            <a href="../profile/profile.html">
                <span class="material-icons-sharp">person_outline</span>
                <h3>Perfil</h3>
            </a>
            <a href="{{ route('dashboard') }}">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Painel Central</h3>
            </a>
            <a href="../report/report.html">
                <span class="material-icons-sharp">receipt_long</span>
                <h3>Relatório</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">insights</span>
                <h3>Dashboard</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">mail_outline</span>
                <h3>Mensagens</h3>
                <span class="message-count">26</span>
            </a>
            <a href="#" class="active">
                <span class="material-icons-sharp">directions_car</span>
                <h3>Meus carros</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">support_agent</span>
                <h3>Suporte</h3>
            </a>
            <a href="../config-user/config.html">
                <span class="material-icons-sharp">settings</span>
                <h3>Configuração</h3>
            </a>
            <a  href="{{ route('car.create') }}">
                <span class="material-icons-sharp">add</span>
                <h3>Adicionar carro</h3>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Sair</h3>
                </a>
            </form>
        </div>
    </aside>
    <main>
        <h1>Histórico Carros</h1>
        <div class="recent-orders">
            <table>
                <thead>
                <tr>
                    <th>Nome do carro</th>
                    <th>Placa do carro</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($cars as $car)
                    <tr>
                        <td>{{ $car->modelo }}</td>
                        <td>{{ $car->placa }}</td>
                        <td>{{ $car->getModalidade() }}</td>
                        <td class="warning">Pendente</td>
                        <td class="primary" style="cursor: pointer;">
                            <form method="POST" action="{{ route('car.delete', $car) }}">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Excluir
                                </a>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center">Sem carros registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>
@if(session()->has('success'))
    <script>
        iziToast.success({
            title: 'Sucesso',
            message: '{{ session('success') }}',
            position: 'topRight',
        });
    </script>
@endif
</html>
