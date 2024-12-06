<?php
$dbHost = '127.0.0.1: 3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'gymbro';

$conn_global = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName);

if($conn->connect_error)
{
  echo "Erro ao conectar" . $conn->connect_error;
}
else
{
  echo "";
}
