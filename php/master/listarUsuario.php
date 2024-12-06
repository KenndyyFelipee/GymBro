<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar usuario</title>
    <link rel="shortcut icon" href="/GYMBRO1/img/gymbrologoteste.png" type="image/x-icon">
</head>
<body>
    

<?php

    include 'conn.php';

    // Lista do professor
    print "<h1>Lista de professores</h1>";
    include 'listarUsuario2.php';
    
    print '<link rel="stylesheet" href="/GYMBRO1/php/usuario/tabelaUsu.css">';

    $mostar = "SELECT * FROM usuario";

    // execultar o SELECT res=resultado.
    $res = $conn->query($mostar);

    // contar  as linhas qtd=quantidade de linhas.
    $qtd = $res->num_rows;

    // verificando se existe alguma coisa na tabela.
    if($qtd > 0){

    // fetch_object() retorna uma linha completa de uma tabela do banco de dados.
        print "<h1>Lista de usuarios</h1>";

        print "<table>";

        print "<tr class='cabecario'>";
            print "<td>CPF</th>";
            print "<th>Nome</th>";
            print "<th>Data de Nascimento</th>";
            print"<th>Genero</th>";
            print "<th>Nome Materno</th>";
            print "<th>Email</th>";
            print"<th>Telefone</th>";
            print"<th>Telefone Fixo</th>";
            print"<th>CEP</th>";
            print"<th>Cidade</th>";
            print"<th>Bairro</th>";
            print"<th>Estado</th>";
            print"<th>Endereço</th>";
            print "<th>Logado/Deslogado</th>";
            print"<th>Editar/Apagar</th>";
        print "</tr>";


        while($row = $res->fetch_object()){
            print "<tr>";
                print "<td>" . $row->Id_usu . "</td>";
                print "<td>" . $row->nome . "</td>";
                print "<td>" . $row->dataNasc . "</td>";
                print "<td class ='genero'>" . $row->genero . "</td>";
                print "<td>" . $row->nomeMaterno . "</td>";
                print "<td>" . $row->email . "</td>";
                print "<td>" . $row->telefone . "</td>";
                print "<td>" . $row->telefoneFixo . "</td>";
                print "<td>" . $row->CEP . "</td>";
                print "<td>" . $row->cidade . "</td>";
                print "<td>" . $row->bairro . "</td>";
                print "<td>" . $row->estado . "</td>";
                print "<td>" . $row->endereco . "</td>";
                print "<td>" . $row->logado . "</td>";

                print "<td>
                            <button class='enviar' onclick=\"location.href='/GYMBRO1/php/usuario/updateUsu.php?Id_usu=".$row->Id_usu."';\">Editar</button>
                            <button class='excluir' onclick=\"if(confirm('tem certeza que deseja excluir?')){location.href='/GYMBRO1/php/usuario/apagar.php?Id_usu=".$row->Id_usu."';}
                                              else{false;}\">Apagar</button>
                       </td>";
            print "</tr>";
        }
        print "</table>";
        print "<button class='cadastrar' onclick=\"location.href='/GYMBRO1/html/cadastro.html';\">Cadastrar</button> ";
        
    }
    else{
        print '<h1>Não foi encontrado ninguem</h1>';
        print "<button class='cadastrar' onclick=\"location.href='/GYMBRO1/html/cadastro.html';\">Cadastrar</button> ";
    }

?>

</body>
</html>