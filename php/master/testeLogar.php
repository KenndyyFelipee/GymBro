<?php
    
        include 'conn.php';
        
        $senhaT = $conn->real_escape_string($_POST['password']);
        $emailT = $conn->real_escape_string($_POST['email']);


        $sql = "SELECT * FROM usuario WHERE senha = '$senhaT' AND email = '$emailT'";
        $sql3 = "SELECT Id_usu FROM usuario WHERE senha = '$senhaT' AND email = '$emailT'";

        $res = $conn->query($sql);
        $res2 = $conn->query($sql3);

        $Id_usu = $res2->fetch_object();

        $qtd = $res->num_rows;

        if($qtd >= 1 ){
            session_start();

            $_SESSION['Id_usu'] = $Id_usu;

            json_encode($_SESSION['Id_usu']);

            $sql2 = "UPDATE usuario SET logado = '1' WHERE senha = '$senhaT' AND email = '$emailT' ";

            $res = $conn->query($sql2);

            echo "<script>alert('Logado');</script>";
            print "<script>location.href='/GYMBRO1/php/master/página-logada.php';</script>";

        }
        else{
            echo "<script>alert('Usuario ou Senha Errados');</script>";
            print "<script>location.href='login.php';</script>";
        }

 
