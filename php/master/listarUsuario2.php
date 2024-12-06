<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar usuario</title>
    <link rel="shortcut icon" href="/GYMBRO1/img/gymbrologoteste.png" type="image/x-icon">
</head>
<body>
    

<?php

    include 'conn.php';

    $mostar = "SELECT * FROM professor";

    // execultar o SELECT res=resultado.
    $res = $conn->query($mostar);

    // contar  as linhas qtd=quantidade de linhas.
    $qtd = $res->num_rows;

    // verificando se existe alguma coisa na tabela.
    if($qtd > 0){

    // fetch_object() retorna uma linha completa de uma tabela do banco de dados.
        print "<table border='1'>";

        print "<tr class='cabecario'>";
            print "<td>CPF</th>";
            print "<th>Email</th>";
            print "<th>Nome</th>";
            print "<th>Genero</th>";
            print "<th>celular</th>";
            print "<th>telefone</th>";
            print "<th>Editar/Apagar</th>";
        print "</tr>";


        while($row = $res->fetch_object()){
            print "<tr>";
                print "<td>" . $row->Id_pro . "</td>";
                print "<td>" . $row->email . "</td>";
                print "<td>" . $row->nome . "</td>";
                print "<td class ='genero'>" . $row->genero . "</td>";
                print "<td>" . $row->telefone . "</td>";
                print "<td>" . $row->telefoneFixo . "</td>";
                print "<td> 
                            <button class='enviar' onclick=\"location.href='/GYMBRO1/php/professor/updateUsu.php?Id_pro=".$row->Id_pro."';\">Editar</button>
                            <button class='excluir' onclick=\"if(confirm('tem certeza que deseja excluir?')){location.href='/GYMBRO1/php/professor/apagar.php?Id_pro=".$row->Id_pro."';}
                                              else{false;}\">Apagar</button>
                       </td>";
            print "</tr>";
        }
        print "</table>";
        print "<button class='cadastrar' onclick=\"location.pathname='/GYMBRO1/php/professor/cadastroProf.php';\">Cadastrar</button> ";
        
    }
    else{
        print '<h1>Nenhum professor foi encontrado</h1>';
        print "<button class='cadastrar' onclick=\"location.pathname='/GYMBRO1/php/professor/cadastroProf.php';\">Cadastrar</button> ";
    }

?>

</body>
</html>