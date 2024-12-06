<?php

    include 'conn.php';

    $Id_pro = $_POST['cpf'];
    $nome = $_POST['nome_completo'];
    $dataNasc = $_POST['data_nascimento'];
    $genero = $_POST['Genero'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['celular'];
    $telefoneFixo = $_POST['telefone_fixo'];

    $id_pro = str_replace(['.', '-'], '', $Id_pro);

    $sql = "INSERT INTO professor (Id_pro,nome,email,senha,dataNasc,genero,telefone,telefoneFixo) 
    VALUES ('$id_pro','$nome','$email','$senha','$dataNasc','$genero','$telefone','$telefoneFixo')" ;

    if($conn->query($sql) == TRUE){
        echo "<script>alert('usuario Cadatrado');</script>";
        print "<script>location.href='/GYMBRO1/php/master/login.php';</script>";
    }
    else{
        echo "<script>alert(''falha ao cadastrar usuario' . $conn->error');</script>";
        print "<script>location.href='/GYMBRO1/php/professor/cadastroProf.php'</script>";
    }

