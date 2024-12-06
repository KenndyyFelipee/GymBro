<?php

    include 'conn.php';

    $logado = "0";
    $nome = $_POST['nome_completo'];
    $dataNasc = $_POST['data_nascimento'];
    $genero = $_POST['Genero'];
    $nomeMa = $_POST['nome_materno'];
    $Id_usu = $_POST['Id_usu'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['celular'];
    $telefoneFixo = $_POST['telefone_fixo'];
    $CEP = $_POST['cep'];
    $bairro = $_POST['region'];
    $cidade = $_POST['city'];
    $estado = $_POST['state'];
    $endereco = $_POST['address'];
    $img ="./img/UsuarioOFF.png";

    $id_usu = str_replace(['.', '-'], '', $Id_usu);

    $sql = "INSERT INTO usuario (Id_usu,nome,dataNasc,genero,nomeMaterno,email,telefone,telefoneFixo,
    CEP,cidade,bairro,estado,endereco,senha,logado,img)
    VALUES ('$id_usu','$nome','$dataNasc','$genero','$nomeMa',
    '$email','$telefone','$telefoneFixo','$CEP','$cidade','$bairro','$estado','$endereco','$senha','$logado','$img')";

    $sql_check = $conn->prepare("SELECT * FROM usuario WHERE Id_usu = ?");
    $sql_check->bind_param('s', $Id_usu);
    $sql_check->execute();
    $result = $sql_check->get_result();


    if ($result->num_rows > 0) {
        echo "<script>alert('Usuário já existe com o ID fornecido.');</script>";
        print "<script>location.href='/GYMBRO1/html/cadastro.html';</script>";
    }
    else if($conn->query($sql) == TRUE){
        echo "<script>alert('usuario Cadatrado');</script>";
        print "<script>location.href='/GYMBRO1/php/master/login.php';</script>";
    }
    else{
        echo "<script>alert('Falha ao cadastrar usuário: {$conn->error}');</script>";
        print "<script>location.href='/GYMBRO1/hmtl/cadastro.html'</script>";
    }
?>