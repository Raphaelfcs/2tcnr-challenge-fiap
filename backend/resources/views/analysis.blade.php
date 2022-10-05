<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="/css/analysis.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
</head>
<body>
<div class="container">
    <div class="title">Análise</div>
    <div class="content">
        <form action="" method="POST">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nome da Empresa</span>
                    <input type="text" placeholder="Nome da Empresa" name="company_name" required>
                </div>
                <div class="input-box">
                    <span class="details">Nome do funcionário</span>
                    <input type="text" placeholder="Funcionário" name="employee_name" required>
                </div>
                <div class="input-box">
                    <span class="details">Telefone</span>
                    <input type="text" placeholder="Telefone" name="phone_number" required>
                </div>
                <div class="input-box">
                    <span class="details">Frota de carro</span>
                    <input type="number" placeholder="Número da Frota" name="car_fleet_size" required>
                </div>
                <div class="input-box full-width">
                    <span class="details">Localização</span>
                    <input type="text" placeholder="Localização" name="localization" required>
                </div>
            </div>
    </div>
    <div class="button">
        <input type="submit" class="submit-btn" value="Enviar análise">
    </div>
    </form>
</div>
</div>

</body>
</html>
