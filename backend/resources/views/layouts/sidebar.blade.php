@if(auth()->user()->admin())
    <a href="{{ route('adminUsers') }}" @if(request()->routeIs('adminUsers')) class="active" @endif>
        <span class="material-icons-sharp">person</span>
        <h3>Usuários</h3>
    </a>

    <a href="{{ route('adminCars') }}" @if(request()->routeIs('adminCars')) class="active" @endif>
        <span class="material-icons-sharp">directions_car</span>
        <h3>Carros</h3>
    </a>
@else
    <a href="{{ route('dashboard') }}" @if(request()->routeIs('dashboard')) class="active" @endif>
        <span class="material-icons-sharp">grid_view</span>
        <h3>Painel Central</h3>
    </a>
    <a href="{{ route('report') }}">
        <span class="material-icons-sharp">receipt_long</span>
        <h3>Relatório</h3>
    </a>
{{--    <a href="#">--}}
{{--        <span class="material-icons-sharp">insights</span>--}}
{{--        <h3>Dashboard</h3>--}}
{{--    </a>--}}
{{--    <a href="#">--}}
{{--        <span class="material-icons-sharp">mail_outline</span>--}}
{{--        <h3>Mensagens</h3>--}}
{{--        <span class="message-count">26</span>--}}
{{--    </a>--}}
    <a href="{{ route('cars.index') }}" @if(request()->routeIs('cars.index')) class="active" @endif>
        <span class="material-icons-sharp">directions_car</span>
        <h3>Meus carros</h3>
    </a>
{{--    <a href="#">--}}
{{--        <span class="material-icons-sharp">support_agent</span>--}}
{{--        <h3>Suporte</h3>--}}
{{--    </a>--}}
    <a href="{{ route('config') }}">
        <span class="material-icons-sharp">settings</span>
        <h3>Configuração</h3>
    </a>
    <a href="{{ route('car.create') }}">
        <span class="material-icons-sharp">add</span>
        <h3>Adicionar carro</h3>
    </a>
@endif
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
        <span class="material-icons-sharp">logout</span>
        <h3>Sair</h3>
    </a>
</form>
