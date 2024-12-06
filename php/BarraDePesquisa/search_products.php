<?php

$dbHost = '127.0.0.1: 3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'gymbro';

$conn = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName);

if($conn->connect_error)
{
  echo "Erro ao conectar" . $conn->connect_error;
}
else
{
  echo "";
}

// Ativa a exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conectar ao banco de dados
include("../master/conn.php");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$searchforresults = isset($_GET['caixa_de_pesquisa']) ? "%" . trim($_GET['caixa_de_pesquisa']) . "%" : "";

// Preparar a consulta SQL
$sql = "SELECT * FROM produtos WHERE nome LIKE ?";

// Iniciar a execução da consulta
if (isset($_GET['caixa_de_pesquisa'])) {
    $pesquisa = $_GET['caixa_de_pesquisa'];
    // Use prepared statements para evitar injeção de SQL
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $searchforresults);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='produto'>";
                echo "<p><strong>" . $row["nome"] . "</strong></p>";
                echo "<p><em>Marca:</em> " . $row["marca"] . "</p>";
                echo "<p><em>Valor:</em> R$ " . number_format($row["valor"], 2, ',', '.') . "</p>";
                echo "<p><em>Peso:</em> " . number_format($row["peso"], 2, ',', '.') . " kg</p>";
                echo "<p><em>Descrição:</em> " . $row["descricao"] . "</p>";
                echo "</div><hr>";
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta.";
    }
}

$conn->close();
?>
