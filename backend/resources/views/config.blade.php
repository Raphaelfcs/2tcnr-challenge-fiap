<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webmonitors</title>
    <link rel="stylesheet" href="/css/config.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
</head>
<body>
<div class="container">
    <div class="leftbox">
        <nav>
            <a id="tab-0" onclick="tabs(0)" class="tab active">
                <i class='bx bxs-user'></i>
            </a>
            <a id="tab-1" onclick="tabs(1)" class="tab">
                <i class='bx bxs-credit-card' ></i>
            </a>
            <a id="tab-2" onclick="tabs(2)" class="tab">
                <i class='bx bx-desktop' ></i>
            </a>
            <a id="tab-3" onclick="tabs(3)" class="tab">
                <i class='bx bx-list-check'></i>
            </a>
        </nav>
    </div>
    <div class="rightbox">
        <div class="profile tabShow">
            <h1>Informações Pessoais</h1>
            <h2>Nome Completo</h2>
            <input type="text" class="input" value="Mateus Costa Figueiredo">
            <h2>Aniversário</h2>
            <input type="text" class="input" value="15/03/1991">
            <h2>Gênero</h2>
            <input type="text" class="input" value="Masculino">
            <h2>Email</h2>
            <input type="text" class="input" value="mateus@cloudit.com">
            <h2>Senha</h2>
            <input type="password" class="input" value="mateus123">
        </div>
        <div class="payment tabShow">
            <h1>Informações de Pagamento</h1>
            <h2>Método de Pagamento</h2>
            <input type="text" class="input" value="MasterCard - 1234 **** **** 5678">
            <h2>Endereço da Fatura</h2>
            <input type="text" class="input" value="Rua Webmonitors - 123">
            <h2>CEP</h2>
            <input type="text" class="input" value="11122333">
            <h2>Dia da Vencimento</h2>
            <input type="text" class="input" value="20/2035">
            <h2>Código de Segurança</h2>
            <input type="password" class="input" value="123">
        </div>
        <div class="subscription tabShow">
            <h1>Informações de Subscrição</h1>
            <h2>Histórico de Pagamento</h2>
            <p>12 de Maio, 2022</p>
            <h2>Próxima Fatura</h2>
            <p>R$2.000 <span>Taxas incluso</span></p>
            <h2>Plano</h2>
            <p>Plano Empresarial</p>
            <h2>Valor</h2>
            <p>R$2.000/mês</p>
        </div>
        <div class="privacy tabShow">
            <h1>Configurações de Privacidade</h1>
            <h2>Gerenciamento de Notificações</h2>
            <p>Ativado</p>
            <h2>Gerenciamento de Configurações de Privacidade</h2>
            <p></p>
            <h2>Termos de Uso</h2>
            <p></p>
            <h2>Personalize sua experiência</h2>
            <p></p>
            <h2>Proteja sua conta</h2>
            <p>Autenticação Multifator: Ativado</p>
        </div>
        <button class="btn" style="background-color: grey" onclick="location.href = '{{ route('dashboard') }}'">Voltar</button>
        <button class="btn" onclick="success()">Atualizar</button>
    </div>
</div>

<script src="../main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    const tabBtn = document.querySelectorAll(".tab");
    const tab = document.querySelectorAll(".tabShow");

    function tabs(panelIndex){
        tab.forEach(function(node) {
            node.style.display = "none";
        });
        tab[panelIndex].style.display = "block";

        $('.tab').removeClass('active');
        $('#tab-' + panelIndex).addClass('active');
    }
    tabs(0);

    function success() {
        iziToast.success({
            title: 'Sucesso',
            message: 'Informações atualizadas com sucesso!',
            position: 'topRight',
        });
    }
</script>
<script>
    $(".tab").click(function() {
        $(this).addClass("active").siblings().removeClass("active")
    })
</script>
</body>
</html>
