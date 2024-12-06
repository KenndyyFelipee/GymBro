<?php

include 'conn.php';

session_start();

// se tiver alguma coisa e não estiver em branco ele entra
if(isset($_FILES['icone']) && !empty($_FILES['icone']['name'])){
    $img = "./img/" . $_FILES['icone']['name'];
    move_uploaded_file($_FILES['icone']['tmp_name'] ,$img);
}
else{
    $img ="./img/UsuarioOFF.png";
}

$sql = "UPDATE usuario SET img='{$img}'
WHERE Id_usu=".$_SESSION["Id_usu"]->Id_usu;

if($conn->query($sql) == TRUE){
    echo "<script>alert('Imagem Editada');</script>";
    print "<script>location.href='/GYMBRO1/php/master/página-logada.php';</script>";
}
else{
    echo "<script>alert('falaha ao Editar Imagem . $conn->error');</script>";
    print "<script>location.href='/GYMBRO1/php/master/configuracoes.php'</script>";
}