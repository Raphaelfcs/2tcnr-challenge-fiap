@extends('layouts.main')

@section('body')
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
@endsection
