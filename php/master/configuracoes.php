<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações - GYMBRO</title>
    <link rel="shortcut icon" href="/GYMBRO1/img/gymbrologoteste.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #d36600;
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            background-color: #d36600;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            color: white;
        }

        .tabs div {
            cursor: pointer;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .tabs div:hover {
            background-color: #e88327;
        }

        .tabs div.active {
            background-color: #e88327;
            font-weight: bold;
        }

        .content {
            padding: 20px;
            display: none;
        }

        .content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            margin: 5px 0;
        }

        input[type="file"] {
            padding: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #d36600;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #e88327;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        /* Estilos para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>


    <?php
    
        include 'conn.php';

        session_start();

        if(!isset($_SESSION['Id_usu']) == true ){
            print "<script>location.href='/GYMBRO1/html/cadastro.html';</script>";
        }
        else{
            $Id_usu = $_SESSION['Id_usu'];
        }

    ?>

    <div class="container">
        <h1>Configurações do Usuário</h1>

        <div class="tabs">
            <div id="tabName" class="active">Atualizar Dados</div>
            <div id="tabProfilePicture">Mudar Foto de Perfil</div>
            <div id="tabMasterProfile">Perfil Master</div>
        </div>

        <div id="contentName" class="content active">
            <h3>Atualizar Dados</h3>
            <form action="/GYMBRO1/php/usuario/updateUsu.php?Id_usu=<?php print $_SESSION['Id_usu']->Id_usu?>" method="post">
                <button>Atualizar</button>
            </form>
        </div>

        <form action="/GYMBRO1/php/usuario/attImagem.php" method="post" enctype="multipart/form-data">
            <div id="contentProfilePicture" class="content">
                <h3>Mudar Foto de Perfil</h3>
                <div class="form-group">
                    <img src="/GYMBRO1/php/usuario/img/UsuarioOFF.png" id="profilePic" name="profilePic" class="profile-pic" alt="Foto de perfil">
                    <input type="file" name="icone" id="icone" accept="image/*">
                </div>
                <button onclick="changeProfilePicture()">Salvar</button>
            </div>
        </form>

        <div id="contentMasterProfile" class="content">
            <h3>Entrar com Perfil Master</h3>
            <button onclick="openLoginModal()">Entrar</button>
        </div>
    </div>

    <!-- Modal para o login -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Login do Perfil Master</h2>
            <div class="form-group">
                <label for="masterUsername">Usuário</label>
                <input type="text" id="masterUsername" placeholder="Digite o nome de usuário">
            </div>
            <div class="form-group">
                <label for="masterPassword">Senha</label>
                <input type="password" id="masterPassword" placeholder="Digite a senha">
            </div>
            <button onclick="validateMasterLogin()">Entrar</button>
        </div>
    </div>

    <script>

        // Função para exibir o conteúdo da aba ativa
        function switchTab(tabId) {
            document.querySelectorAll('.tabs div').forEach(tab => {
                tab.classList.remove('active');
            });

            document.querySelectorAll('.content').forEach(content => {
                content.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            document.getElementById('content' + tabId.charAt(3).toUpperCase() + tabId.slice(4)).classList.add('active');
        }

        document.getElementById('icone').addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            // Verifica se um arquivo foi selecionado e se é uma imagem
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                
                // Define o que fazer quando a leitura for concluída
                reader.onload = function(e) {
                    // Define o src da img com o conteúdo da imagem lida
                    const profilePic = document.getElementsByName('profilePic')[0];
                    profilePic.src = e.target.result;
                    profilePic.style.display = 'block'; // Exibe a imagem
                };

                // Lê o arquivo como uma URL de dados
                reader.readAsDataURL(file);
            } else {
                // Se não for uma imagem, oculta a pré-visualização e exibe uma mensagem
                const profilePic = document.getElementsByName('profilePic')[0];
                profilePic.style.display = 'none';
                alert('Por favor, selecione um arquivo de imagem válido.');
            }
        });

        function changeProfilePicture(){
            let img = document.getElementById("profilePic");
        }

        // Função para abrir o modal de login
        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'block';
        }

        // Função para fechar o modal de login
        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
        }

        // Função para validar o login do Perfil Master
        function validateMasterLogin() {
            const username = document.getElementById('masterUsername').value;
            const password = document.getElementById('masterPassword').value;

            // Usuário e senha fictícios
            const masterUsername = "admin";
            const masterPassword = "123456";

            if (username === masterUsername && password === masterPassword) {
                alert("Login bem-sucedido! Redirecionando para o Perfil Master...");
                window.location.href = 'listarUsuario.php';
            } else {
                alert("Usuário ou senha incorretos.");
            }
        }

        // Adicionar evento de clique às abas
        document.getElementById('tabName').addEventListener('click', function () { switchTab('tabName'); });
        document.getElementById('tabProfilePicture').addEventListener('click', function () { switchTab('tabProfilePicture'); });
        document.getElementById('tabMasterProfile').addEventListener('click', function () { switchTab('tabMasterProfile'); });
    </script>
</body>

</html>
