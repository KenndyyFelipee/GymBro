<?
include("conn.php");

// recebendo parametros
$nome=$_POST['nome'];
$marca=$_POST['marca'];
$valor=$_POST['valor'];
$peso=$_POST['peso'];
$descricao=$_POST['descricao'];


// inserindo na tabela 
$sql = "INSERT INTO produto(id_produto, nome, marca, valor, peso, descricao) VALUES('$id_produto', '$nome', '$marca', '$valor', '$peso', '$descricao')";

if(mysqli_query($conn, $sql)){
    echo "Produto cadastrado com sucesso";
}
else{
    echo"Erro ao cadastrar produto". mysqli_connect_error();
}

//encerramento do mysql
mysqli_close($conn);
?>
