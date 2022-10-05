<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
    <link rel="stylesheet" href="/css/add-car.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="wrapper">
    <header>Adicionar veículo</header>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <p>Modalidade</p>
        <div class="dbl-field">
            <div class="field" style="width: 100%">
                <select name="modalidade" required>
                    <option value="1">Aluguel</option>
                    <option value="2">Venda</option>
                </select>
            </div>
        </div>

        <div class="dbl-field">
            <div class="field">
                <input type="text" name="modelo" placeholder="Modelo" required>
            </div>
            <div class="field">
                <input type="text" name="placa" placeholder="Placa" required>
            </div>
        </div>
        <div class="dbl-field">
            <div class="field">
                <input type="text" name="renavam" placeholder="Renavam" required>
            </div>
            <div class="field">
                <input type="text" name="ano" placeholder="Ano" required>
            </div>
        </div>
        <div class="dbl-field">
            <div class="field">
                <input type="text" name="cambio" placeholder="Câmbio" required>
            </div>
            <div class="field">
                <input type="text" name="preco" placeholder="Preço" required>
            </div>
        </div>
        <div class="dbl-field">
            <div class="field">
                <input type="text" name="combustivel" placeholder="Combustível" required>
            </div>
            <div class="field">
                <input type="text" name="condicao" placeholder="Condição" required>
            </div>
        </div>
        <div class="message">
            <textarea placeholder="Descrição do veículo" name="descricao" required></textarea>
        </div>
        <p>Faça upload da imagem do veículo</p>
        <input class="file-input" type="file" name="file" required>
        <div class="button-area">
            <button type="button" style="margin-right: 15px" onclick="dashboard()">Voltar</button>
            <span></span>
            <button type="submit">Prosseguir</button>
            <span></span>
        </div>
    </form>
</div>
</body>
<script>
    function dashboard() {
        location.href = '{{ route('dashboard') }}';
    }
</script>
</html>
