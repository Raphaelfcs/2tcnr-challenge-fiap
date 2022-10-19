<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/password.css">
    <title>Webmonitors</title>
</head>
<body>
<div class="login">
    <div>
        <img src="/img/logo_password.png">
    </div>
</div>
<div class="inputField">
    <h2>Gere uma senha e envie para desbloquear a caixa de segurança</h2>
    <input type="text" name="" placeholder="A sua senha aparecerá aqui" id="password" readonly="">
    <div id="btn" onclick="getPassword()">Gerar Senha</div>
    <div id="copyBtn" onclick="location.href = '{{ route('carEvaluation') }}'">Enviar Senha</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">

    function getPassword(){
        document.getElementById("password").value = (Math.floor(Math.random() * 1000) + 99);
    }
    getPassword()

</script>
</body>
</html>
