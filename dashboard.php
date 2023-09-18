<?php
	session_start();
	if(empty($_SESSION) ){
		print "<script>location.href='index.php';</script>";
	}
	print "Olá, ".$_SESSION["nome"]."<br>";
	print "<a href='logout.php'>Sair</a><br>";

	if( ($_SESSION["tipo"]=="2") ){
		
		print "CONTEUDO ADM";
	}

	if($_SESSION["tipo"]=="1"){
		print "<script>location.href='menuavaliador.php';</script>";
	}

?>