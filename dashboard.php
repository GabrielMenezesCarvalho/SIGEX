<?php
    session_start();

    if(empty($_SESSION)) {
        print "<script>location.href='index.php';</script>";
    }

    if(isset($_SESSION["avaliador"]) && $_SESSION["avaliador"] == "1") {
        print "<script>location.href='menuavaliador.php';</script>";
    }

    if(isset($_SESSION["tipo"])) {
        if($_SESSION["tipo"] == "1") {
            print "Usuário é do tipo 1 - Discente";
        } elseif($_SESSION["tipo"] == "2") {
            print "Usuário é do tipo 2 - Docente";
        } elseif($_SESSION["tipo"] == "3") {
            print "Usuário é do tipo 3 - Técnico";
        } elseif($_SESSION["tipo"] == "4") {
            print "Usuário é do tipo 4 - Externo";
        } elseif($_SESSION["tipo"] == "5") {
            print "<script>location.href='admin.php';</script>";
        } else {
            
            print "Tipo de usuário desconhecido";
        }
    }
?>