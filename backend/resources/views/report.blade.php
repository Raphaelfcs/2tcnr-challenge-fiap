<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Webmonitors</title>
    <link rel="stylesheet" href="/css/report.css" />
</head>
<body>
<h1>Solicitação de relatório</h1>
<form
    action="{{ route('report.finished') }}"
    method="get"
    class="form"
>
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" required />
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" required />
    <label for="message">Mensagem</label>
    <textarea name="message" id="message" required></textarea>
    <input type="hidden" name="_captcha" value="false" />
    <input
        type="hidden"
        name="_next"
        value="https://yourdomain.co/thanks.html"
    />
    <button type="submit">Enviar</button>
</form>
</body>
</html>
