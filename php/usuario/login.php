<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYMBRO LOGIN</title>
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
    <!-- VLibras Widget -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <!-- Fim VLibras Widget -->

</body>
</html>
<style>
    ::after, 
::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}



body{
    font-family: sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    transition:  0.2s linear;
    background-size: cover;
    background-position: center;
    background-image: url(https://s.zst.com.br/cms-assets/2021/01/peso-de-academia-5-.png);
    

}




.container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100vh;
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    box-shadow: 0 0 10px rgba(0, 0, 0, .10);
}

.box_login{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 400px;
    height: 460px;
    padding: 50px;
    border-radius: 10px;
    text-align: center;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border: 2px solid rgba(255, 255, 255, .2);

}

.box_login .title{
    color: #fff;
    font-size: 24px;
    text-shadow: 0 0 10px rgba(0, 0, 0, .5);
}

.box_login form{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    margin-top: 32px;
}


.box_login input{
    outline: none;
    background-color: transparent;
    color: #fff;
    width: 100%;
    height: 48px;
    border: 2px solid rgba(255, 255, 255, .2);
    padding-left: 16px;
    font-size: 14px;
    margin-bottom: 16px;
    border-radius: 10px;

}   

.box_login input:focus{
    border: 2px solid rgba(255, 255, 255, .3);
}

.box_login input::placeholder{
    color: #ccc;

}

.box_login button{
    border: none;
    outline: none;
    width: 100%;
    height: 48px;
    font-size: 18px;
    background-color: orangered;
    color: #fFf;
    border-radius: 10px;
    cursor: pointer;
}

.box_login button:hover{
    background-color:rgb(219, 68, 14);
}

.box_login .divider{
    display: block;
    width: 80%;
    height: 1px;
    background-color: #fff;
    margin-top: 32px;
    margin-bottom: 32px;
    opacity: .2;
}

.box_login a{
    font-size: 16px;
    color: #fff;
    text-decoration: none;
}

.box_login a:hover{
    text-decoration: underline;
}

div i{
    font-size: 25px;
    cursor: pointer;
    position: absolute;
    right: 5%;
    z-index: 1;
    color: #ccc;
    margin-right: 40px;
    margin-top: 85px;

}

.remember-forgot{
    display: flex;
    justify-content: space-between;

}

.remember-forgot  label input{
    accent-color: #fff;
    margin-right: 40px;
    text-size-adjust: 15px;
    color: #ccc;
}

.remember-forgot a{
    text-decoration: none;
    color: #fFf;
    font-size: 15px;
    margin-left: 25px;

}

.remember-forgot a:hover {
    text-decoration: underline;
    
}

.remember-forgot input {
    width:20px;
    margin-right: 200px;
    align-items: center;
    color: green;
}
.altern{
    width: 40px;
    height: 40px;
    border-radius: 60px;
    background-color:white ;
    margin-left: 5px;
    transition: transform 0.5s;
    position: absolute; /* Fixa o botão na parte superior esquerda */
    top: 10px;
    left: 10px;
    cursor: pointer;
}
.container-altern{
    width: 95px;
    height: 50px;
    border-radius: 60px;
    background-color: rgb(219, 68, 14);
    padding: 5px;
    display: flex;
    position: absolute; /* Fixa o botão na parte superior esquerda */
    top: 10px;
    left: 10px;
    cursor: pointer;
}
#troca:checked + .container-altern .altern{
    transform: translateX(40px);
    background-color: black;
    
}
.modo{
    text-transform: uppercase;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

</style>