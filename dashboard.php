<?php
	session_start();
	if(empty($_SESSION) ){
		print "<script>location.href='index.php';</script>";
	}
	
	if($_SESSION["tipo"]=="1"){
		print "<script>location.href='menuavaliador.php';</script>";
	}
	
	if( ($_SESSION["tipo"]=="2") ){
		
		print "CONTEUDO tipo 2";
	}

	if( ($_SESSION["tipo"]=="5") ){
		
		print "<script>location.href='admin.php';</script>";
	}

?>