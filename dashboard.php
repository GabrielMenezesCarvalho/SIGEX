<?php
	session_start();
	if(empty($_SESSION) ){
		print "<script>location.href='index.php';</script>";
	}
	print "Olá, ".$_SESSION["nome"]."<br>";
	print "<a href='logout.php'>Sair</a><br>";

	if( ($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2") ){
		print "Outro conteúdo<br>";
	}

	if($_SESSION["tipo"]=="1"){
		print "Acesso ao menu principal<br>";
	}

?>