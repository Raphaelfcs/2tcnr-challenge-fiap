@extends('layouts.main')

@section('body')
    <h1>Carros</h1>
    <div class="recent-orders">
        <table>
            <thead>
            <tr>
                <th>Nome do carro</th>
                <th>Placa do carro</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cars as $car)
                <tr>
                    <td>{{ $car->modelo }}</td>
                    <td>{{ $car->placa }}</td>
                    <td>{{ $car->getModalidade() }}</td>
                    <td class="{{ $car->getStatusClass() }}">{{ $car->getStatus() }}</td>
                    <td style="cursor: pointer;">
                        @if ($car->status == 0 || $car->status == 1)
                            <form method="POST" style="display: inline-block" action="{{ route('adminCarDecline', $car) }}">
                                @csrf

                                <a href="{{ route('adminCarDecline', $car) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Reprovar
                                </a>
                            </form>
                        @endif
                        @if ($car->status == 0 || $car->status == 2)
                            <form method="POST" style="display: inline-block; margin-left: 15px" action="{{ route('adminCarApprove', $car) }}">
                                @csrf

                                <a style="color: #41f1b6 !important;" href="{{ route('adminCarApprove', $car) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Aprovar
                                </a>
                            </form>
                        @endif
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
