<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMBRO LOGIN</title>
    <link rel="stylesheet" href="../css/STYLE-LOGIN.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="../javascript/SCRIPT-LOGIN.js" defer></script>
    <link rel="shortcut icon" href="../img/gymbrologoteste.png" type="image/x-icon">
</head>

<body>

    <div class="box_login">
        <h1 class="title">Bem vindo ao GYMBRO</h1>
        <form id="loginForm" action="testeLogar.php" method="post">
            <input id="login" type="email" name="email" placeholder="Digite seu e-mail..." required>
            <input id="senha" type="password" name="password" placeholder="Digite sua senha..." required>
            <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox">
                    Lembrar minha senha
                </label>
                <a href="../html/esqueceuasenha.html">Esqueceu sua senha?</a>
            </div>
            <button type="submit">Entrar</button>
            <p></p>
            <button type="button" id="clearButton">Limpar</button>
            <div class="divider"></div>
            <p>Não tem uma conta?<a href="../html/cadastro.html" title="Criar uma conta">Cadastre-se</a></p>
        </form>
    </div>

    <script>
        const clearButton = document.getElementById('clearButton');

        clearButton.addEventListener('click', function() {
            document.getElementById('loginForm').reset();
        });
    </script>

</body>
</html>
