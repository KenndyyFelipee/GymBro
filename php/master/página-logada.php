<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMBRO</title>
    <link rel="stylesheet" href="/css/PGLogada.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/img/gymbrologoteste.png" type="image/x-icon">
    <style>
        /* Estilização básica para o perfil e o campo de upload */
        #profileIcon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #d36600;
            overflow: hidden;
            position: relative; /* Necessário para o menu de perfil */
        }

        #profileIcon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Esconde o input file, mas ele estará disponível para o clique invisível */
        #profileIcon input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0; /* Torna o input invisível */
            cursor: pointer;
        }

        /* Estilo para o menu de perfil */
        #profileMenu {
            display: none;
            position: absolute;
            top: 60px; /* Posiciona o menu logo abaixo do ícone de perfil */
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
            width: 150px;
        }

        #profileMenu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        #profileMenu a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <?php
        include 'conn.php';
        session_start();

        if(!isset($_SESSION['Id_usu'])){
            header("Location: /GYMBRO1/html/paginainicial.html");
        }
        $mostar = "SELECT * FROM usuario";

        $res = $conn->query($mostar);

        $row = $res->fetch_object()
    ?>
    <header>
        <div class="interface">
            <div class="logo">
                <a href="#">
                    <img src="/GYMBRO1/img/gymbrologoteste.png" alt="Logo do GymBRO" width="110" height="100">
                </a>
            </div>

            <nav class="menu">
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="/html/loja.html">Loja</a></li>
                    <li class="icon-logado">
                        <div id="profileIcon">
                            <!-- Foto de perfil padrão ou upload -->
                            <img src=/php/usuario/<?php print $row->img?> alt="Ícone de perfil">
                        </div>
                        <div id="profileMenu" class="profile-menu">
                            <a href="/php/master/configuracoes.php" id="settingsLink">Configurações</a>
                            <a href="/php/master/logout.php" id="logoutLink">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="topo-do-site">
            <div class="interface">
                <div class="topo">
                    <div class="texto-topo">
                        <h1>Bem-vindo de volta ao GYMBRO<span>!</span></h1>
                        <p>Seu treino continua aqui.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="sobre" class="sobre">
            <div class="interface">
                <h2 class="titulo">Transforme-se com <span>GYMBRO.</span></h2>
                <div class="topo">
                    <div class="sobreGymBRO">
                        <i class="bi bi-layout-wtf"></i>
                        <h3>Treinamentos e<br> Programas</h3>
                    </div>

                    <div class="sobreGymBRO">
                        <i class="bi bi-cart"></i>
                        <a href="/html/loja.html"><h3>Loja Online</h3></a>
                    </div>

                    <div class="sobreGymBRO">
                        <i class="bi bi-calculator"></i>
                        <a href="/html/calculadoraimc.html"><h3>Ferramentas e<br> Recursos Online</h3></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="planos">
            <div class="interface">
                <h2 class="titulo">Planos</h2>
                <div class="topo">
                    <div class="img-port" style="background-image: url(/GYMBRO1/img/1.png);"></div>
                    <div class="img-port" style="background-image: url(/GYMBRO1/img/2.png);"></div>
                    <div class="img-port" style="background-image: url(/GYMBRO1/img/3.png);"></div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 GYMBRO. Todos os direitos reservados.</p>
    </footer>

    <script>
        if (localStorage.getItem('loggedIn') !== 'true') {
            window.location.href = '/html/index.html';
        }

        // Mostrar/Esconder o menu de perfil
        document.getElementById('profileIcon').addEventListener('click', function () {
            const profileMenu = document.getElementById('profileMenu');
            const isVisible = profileMenu.style.display === 'block';
            profileMenu.style.display = isVisible ? 'none' : 'block';
        });

        // Configurações
        document.getElementById('settingsLink').addEventListener('click', function () {
            window.location.href = '/php/master/configuracoes.php';
        });

    </script>
</body>

</html>
