<?php
	session_start();

	if(empty($_POST) or (empty($_POST["email"]) or (empty($_POST["senha"]) ) ) ){
		print "<script>location.href='index.php';</script>";
	}

	include("conexao.php");

	$email = $_POST["email"];
	$senha   = $_POST["senha"];

	$sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha  = '{$senha}' ";

	$res = $conn->query($sql) or die($conn->error);

	$row = $res->fetch_object();

	$qtd = $res->num_rows;

	if($qtd>0){
		$_SESSION["email"] = $email;
		$_SESSION["nome"] = $row->nome;
		$_SESSION["tipo"] = $row->tipo;
		$_SESSION["avaliador"] = $row->avaliador;
		print "<script>location.href='dashboard.php';</script>";
	}else{
		unset($usuario);
		print "<script>alert('Usuário e/ou Senha incorretos!');</script>";
		print "<script>location.href='index.php';</script>";
	}
?>