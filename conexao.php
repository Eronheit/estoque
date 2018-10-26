<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("BD", "estoque");

	$con = mysqli_connect(HOST, USER, PASS) or die ("Conexão falha!");
	$banco = mysqli_select_db($con, BD);
?>