<?php

include 'conn.php';

session_start();

$sql = "UPDATE usuario SET logado = '0' WHERE Id_usu=".$_SESSION['Id_usu']->Id_usu;

$res = $conn->query($sql);

unset($_SESSION['Id_usu']);

header("Location: /GYMBRO1/html/paginainicial.html");