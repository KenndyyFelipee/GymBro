<?php

    include 'conn.php';

    $nome = $_POST['nome_completo'];
    $dataNasc = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $nomeMa = $_POST['nome_materno'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['celular'];
    $telefoneFixo = $_POST['telefone_fixo'];
    $CEP = $_POST['cep'];
    $bairro = $_POST['region'];
    $cidade = $_POST['city'];
    $estado = $_POST['state'];
    $endereco = $_POST['address'];


$sql = "UPDATE usuario SET nome='{$nome}'
,dataNasc='{$dataNasc}',genero='{$genero}'
,nomeMaterno='{$nomeMa}',email='{$email}'
,telefone='{$telefone}',telefoneFixo='{$telefoneFixo}'
,CEP='{$CEP}',cidade='{$cidade}'
,bairro='{$bairro}',estado='{$estado}'
,endereco='{$endereco}',senha='{$senha}'

WHERE Id_usu=".$_REQUEST['Id_usu'];

if($conn->query($sql) == TRUE){
    echo "<script>alert('usuario Editado');</script>";
    print "<script>location.href='/GYMBRO1/php/master/listarUsuario.php';</script>";
}
else{
    echo "<script>alert('falaha ao editar usuario' . $conn->error);</script>";
    print "<script>location.href='/GYMBRO1/php/master/updateUsu.php'</script>";
}