<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMBRO CADASTRO</title>
    <link rel="stylesheet" href="/GYMBRO1/css/cadastro.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="shortcut icon" href="/GYMBRO1/img/gymbrologoteste.png" type="image/x-icon">
</head>
<body>

<script>
    function fechar() {
        window.location.href = "/GYMBRO1/html/paginainicial.html";
    }

    function salvarInformacoes(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const nomeCompleto = document.getElementById('nome_completo').value;
        const genero = document.getElementById('Genero').value;
        const dataNascimento = document.getElementById('data_nascimento').value;
        const email = document.getElementById('email').value;
        const celular = document.getElementById('celular').value;
        const telefoneFixo = document.getElementById('telefone_fixo').value; // Novo campo de telefone fixo
        const senha = document.getElementById('senha').value;
        const confirmarSenha = document.getElementById('confirmar_senha').value;

        // Validação das senhas
        if (senha !== confirmarSenha) {
            alert("As senhas não coincidem. Por favor, tente novamente.");
            return;
        }

        // Armazenando as informações no localStorage
        localStorage.setItem('nomeCompleto', nomeCompleto);
        localStorage.setItem('genero', genero);
        localStorage.setItem('dataNascimento', dataNascimento);
        localStorage.setItem('cpf', cpf);
        localStorage.setItem('email', email);
        localStorage.setItem('celular', celular);
        localStorage.setItem('telefoneFixo', telefoneFixo); // Armazenando o telefone fixo
        localStorage.setItem('senha', senha); // Armazenando a senha

        // Limpa o formulário após o envio
        document.getElementById('address-form').reset();
    }

</script>

<div class="form-container" id="form-container">
    <h2 class="titulo">Faça seu cadastro</h2>


    <form action="/GYMBRO1/php/professor/cadastrar.php" method="post" class="container" id="address-form">
        <div class="form-group">
            <label>Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" minlength="15" maxlength="80" required>
        </div>

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="form-group">
            <label>Gênero:</label>
            <select id="Genero" name="Genero" required>
                <option value="" disabled selected>Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outros</option>
            </select>
        </div>


        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>
        <script>
            $(document).ready(function() {
                $('#cpf').mask('000.000.000-00');
            });
        </script>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Telefone Celular:</label>
            <input type="text" id="celular" name="celular" maxlength="11" required>
        </div>

        <!-- Novo campo de Telefone Fixo -->
        <div class="form-group">
            <label>Telefone Fixo:</label>
            <input type="text" id="telefone_fixo" name="telefone_fixo" maxlength="14">
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" id="senha" name="senha" minlength="6" required>
        </div>

        <div class="form-group">
            <label>Confirmar Senha:</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" minlength="6" required>
        </div>

        <div class="form-group">
            <button id="Close-button" type="submit">Enviar</button>
            <button type="reset" class="reset">Limpar</button>
        </div>
    </form>
    <div id="fade" class="hide"></div>
    <div id="message" class="hide">
        <p></p>
        <button class="fechar" id="close-message" onclick="fechar()">Fechar</button>
    </div>
</div>

</body>
</html>
