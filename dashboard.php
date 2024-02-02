<?php
    session_start();

    if(empty($_SESSION)) {
        print "<script>location.href='index.php';</script>";
    }

    if(isset($_SESSION["avaliador"]) && $_SESSION["avaliador"] == "1") {
        print "<script>location.href='menuavaliador.php';</script>";
    }

    if (isset($_SESSION["tipo"])) {
        if ($_SESSION["tipo"] == "5") {
            print "<script>location.href='admin.php';</script>";
        } else {
            print "<script>location.href='menucomum.php';</script>";
        }
    }
?>

