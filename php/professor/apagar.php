<?php

include 'conn.php';

$sql = "DELETE FROM professor WHERE Id_pro=" .$_REQUEST["Id_pro"];

if($conn->query($sql) == TRUE){
    echo "<script>alert('usuario deletado');</script>";
    print "<script>location.href='/GYMBRO1/php/master/listarUsuario.php';</script>";
}
else{
    echo "<script>alert('falaha ao deletar usuario' . $conn->error);</script>";
    print "<script>location.href='/GYMBRO1/php/master/listarUsuario.php'</script>";
}
