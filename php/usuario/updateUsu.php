<!DOCTYPE html>
<html lang="br">
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

<?php

include 'conn.php';

// recebendo id do botão do listarUsuario (pela URL do HTML)
$sql = "SELECT * FROM usuario WHERE Id_usu=".$_REQUEST["Id_usu"];
$res = $conn->query($sql);
$row = $res->fetch_object();

?>

<script>
    function fechar() {
        window.location.href = "/GYMBRO1/php/master/listarUsuario.php";
    }

    function salvarInformacoes(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const nomeCompleto = document.getElementById('nome_completo').value;
        const dataNascimento = document.getElementById('data_nascimento').value;
        const genero = document.getElementById('genero').value;
        const nomeMaterno = document.getElementById('nome_materno').value;
        const cpf = document.getElementById('cpf').value;
        const email = document.getElementById('email').value;
        const celular = document.getElementById('celular').value;
        const telefoneFixo = document.getElementById('telefone_fixo').value; // Novo campo de telefone fixo
        const cep = document.getElementById('cep').value;
        const cidade = document.getElementById('city').value;
        const bairro = document.getElementById('region').value;
        const estado = document.getElementById('state').value;
        const endereco = document.getElementById('address').value;
        const senha = document.getElementById('senha').value;
        const confirmarSenha = document.getElementById('confirmar_senha').value;

        // Validação das senhas
        if (senha !== confirmarSenha) {
            alert("As senhas não coincidem. Por favor, tente novamente.");
            return;
        }

        // Armazenando as informações no localStorage
        localStorage.setItem('nomeCompleto', nomeCompleto);
        localStorage.setItem('dataNascimento', dataNascimento);
        localStorage.setItem('genero', genero);
        localStorage.setItem('nomeMaterno', nomeMaterno);
        localStorage.setItem('email', email);
        localStorage.setItem('celular', celular);
        localStorage.setItem('telefoneFixo', telefoneFixo); // Armazenando o telefone fixo
        localStorage.setItem('cep', cep);
        localStorage.setItem('cidade', cidade);
        localStorage.setItem('bairro', bairro);
        localStorage.setItem('estado', estado);
        localStorage.setItem('endereco', endereco);
        localStorage.setItem('senha', senha); // Armazenando a senha

        // Limpa o formulário após o envio
        document.getElementById('address-form').reset();
        window.location.href = "/GYMBRO1/php/usuario/salvar.php";
    }

    function consultarCep() {
        const cep = document.getElementById('cep').value.replace(/\D/g, '');

        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na requisição');
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('city').value = data.localidade;
                        document.getElementById('region').value = data.bairro;
                        document.getElementById('state').value = data.uf;
                        document.getElementById('address').value = data.logradouro; // Preenche o endereço
                    } else {
                        alert('CEP não encontrado.');
                    }
                })
                .catch(error => {
                    alert('Erro ao buscar CEP. Verifique sua conexão.');
                    console.error(error);
                });
        } else {
            alert('CEP inválido. Insira um CEP com 8 dígitos.');
        }
    }

    // Adicionando o listener ao campo de CEP
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('cep').addEventListener('blur', consultarCep);
        $('#cpf').mask('000.000.000-00'); // Máscara para o CPF
        $('#telefone_fixo').mask('(00) 0000-0000'); // Máscara para o telefone fixo
    });
</script>

<div class="form-container" id="form-container">
    <h2 class="titulo">Faça seu cadastro</h2>

    <form method="post" class="container" id="address-form" action= "salvar.php?Id_usu=<?php print $row->Id_usu ?>">
        <div class="form-group">
            <label>Nome Completo:</label>
            <input value ="<?php print $row->nome ?>" type="text" id="nome_completo" name="nome_completo" minlength="15" maxlength="80" required>
        </div>

        <div class="form-group">
            <label>Data de Nascimento:</label>
            <input value ="<?php print $row->dataNasc ?>" type="date" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="form-group">
            <label>Gênero:</label>
            <select id="genero" name="genero" required>
                <option value="" disabled selected>Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outros</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nome Materno:</label>
            <input value ="<?php print $row->nomeMaterno ?>" type="text" id="nome_materno" name="nome_materno" minlength="15" maxlength="80" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input value= "<?php print $row->email ?>" type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Telefone Celular:</label>
            <input value= "<?php print $row->telefone ?>" type="text" id="celular" name="celular" maxlength="11" required>
        </div>

        <!-- Novo campo de Telefone Fixo -->
        <div class="form-group">
            <label>Telefone Fixo:</label>
            <input value ="<?php print $row->telefoneFixo ?>" type="text" id="telefone_fixo" name="telefone_fixo" maxlength="10">
        </div>

        <div class="form-group">
            <label>CEP:</label>
            <input value ="<?php print $row->CEP ?>" type="text" id="cep" name="cep" required>
        </div>

        <div class="form-group">
            <label>Cidade:</label>
            <input value ="<?php print $row->cidade ?>" type="text" id="city" name="city" required>
        </div>

        <div class="form-group">
            <label>Bairro:</label>
            <input value ="<?php print $row->bairro ?>" type="text" id="region" name="region" required>
        </div>

        <div class="form-group">
            <label>Estado:</label>
            <input value ="<?php print $row->estado ?>" type="text" id="state" name="state" required>
        </div>

        <div class="form-group">
            <label>Endereço</label>
            <input value ="<?php print $row->endereco ?>" type="text" id="address" name="address" required>
        </div>

        
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" id="senha" name="senha" minlength="6" required>
        </div>
        <?php
            if (isset($_POST['senha'])) {
                $senha = $_POST['senha'];
                $senhaEsperada = $senha ; // Replace with your actual password
        
                if ($senha !== $senhaEsperada) {
                    echo "Senha errada";
                } else {
                    echo "Senha correta";
                }
            }
        ?>

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