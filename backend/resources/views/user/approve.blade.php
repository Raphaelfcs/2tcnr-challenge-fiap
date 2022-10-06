@extends('layouts.main')

@section('body')
    <h1>Usuários</h1>
    <div class="recent-orders">
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Plano</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->planDescription() }}</td>
                    <td>{{ $user->getStatus() }}</td>
                    <td style="cursor: pointer;">
                        @if ($user->plan == 2)
                            @if ($user->analysis->status == 0 || $user->analysis->status == 1)
                                <form method="POST" style="display: inline-block" action="{{ route('adminUserDecline', $user) }}">
                                    @csrf

                                    <a href="{{ route('adminUserDecline', $user) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Reprovar
                                    </a>
                                </form>
                            @endif
                            @if ($user->analysis->status == 0 || $user->analysis->status == 2)
                                <form method="POST" style="display: inline-block; margin-left: 15px" action="{{ route('adminUserApprove', $user) }}">
                                    @csrf

                                    <a style="color: #41f1b6 !important;" href="{{ route('adminUserApprove', $user) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Aprovar
                                    </a>
                                </form>
                            @endif
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
