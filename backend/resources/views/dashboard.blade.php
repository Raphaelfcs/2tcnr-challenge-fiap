@extends('layouts.main', ['tittle' => 'Dashboard'])

@section('body')
    <h1>Painel Central</h1>

    <div class="date">
        <input type="date">
    </div>

    <div class="insights">
        <div class="sales">
            <span class="material-icons-sharp">savings</span>
            <div class="middle">
                <div class="left">
                    <h3>Total Arrecadado</h3>
                    <h1>R$250.400</h1>
                </div>
            </div>
            <small class="text-muted">Último mês</small>
        </div>
        <div class="income">
            <span class="material-icons-sharp">speed</span>
            <div class="middle">
                <div class="left">
                    <h3>Média de KM</h3>
                    <h1>110 KM</h1>
                </div>
            </div>
            <small class="text-muted">Últimas 24 horas</small>
        </div>
        <div class="expenses">
            <span class="material-icons-sharp">device_thermostat</span>
            <div class="middle">
                <div class="left">
                    <h3>Média da Temperatura do Motor</h3>
                    <h1>80°C</h1>
                </div>
            </div>
            <small class="text-muted">Últimas 24 horas</small>
        </div>
    </div>

    <div class="recent-orders">
        <h2>Atividades Recentes</h2>
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
            <tr>
                <td>Honda Civic Si</td>
                <td>BRA2E16</td>
                <td>Compra</td>
                <td class="warning">Pendente</td>
                <td class="primary">Detalhes</td>
            </tr>
            <tr>
                <td>Honda HR-V</td>
                <td>LSN4I09</td>
                <td>Aluguel</td>
                <td class="success">Aprovado</td>
                <td class="primary">Detalhes</td>
            </tr>
            <tr>
                <td>Chevrolet Onix</td>
                <td>BRA0S29</td>
                <td>Aluguel</td>
                <td class="success">Aprovado</td>
                <td class="primary">Detalhes</td>
            </tr>
            <tr>
                <td>BMW X1</td>
                <td>EKY1B38</td>
                <td>Compra</td>
                <td class="warning">Pendente</td>
                <td class="primary">Detalhes</td>
            </tr>
            <tr>
                <td>Jeep Compass</td>
                <td>RTE5B45</td>
                <td>Compra</td>
                <td class="success">Aprovado</td>
                <td class="primary">Detalhes</td>
            </tr>
            <tr>
                <td>Nissan Kicks</td>
                <td>QPB9J93</td>
                <td>Aluguel</td>
                <td class="danger">Negado</td>
                <td class="primary">Detalhes</td>
            </tr>
            <tr>
                <td>Renault Logan</td>
                <td>EAJ2C62</td>
                <td>Aluguel</td>
                <td class="success">Aprovado</td>
                <td class="primary">Detalhes</td>
            </tr>
            </tbody>
        </table>
        <a href="#">Mostrar Mais</a>
    </div>
@endsection
