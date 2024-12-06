<?php

    include 'conn.php';

    $nome = $_POST['nome_completo'];
    $genero = $_POST['Genero'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['celular'];
    $telefoneFixo = $_POST['telefone_fixo'];

    $sql =  "UPDATE professor SET
        nome='{$nome}',
        email='{$email}',
        senha='{$senha}',
        genero='{$genero}',
        telefone='{$telefone}',
        telefoneFixo='{$telefoneFixo}' 
        WHERE Id_pro=".$_REQUEST["Id_pro"];

        if($conn->query($sql) == TRUE){
            echo "<script>alert('usuario Editado');</script>";
            print "<script>location.href='/GYMBRO1/php/master/listarUsuario.php';</script>";
        }
        else{
            echo "<script>alert(''falaha ao editar usuario' . $conn->error');</script>";
            print "<script>location.href='updateUsu.php'</script>";
        }
