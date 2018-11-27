<?php

// define("HOST", "mysql995.umbler.com:41890");
// define("USER", "rootagritech");
// define("PASS", "roottoor");
// define("BD", "vendasagritech");

	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("BD", "estoque");

	$con = mysqli_connect(HOST, USER, PASS) or die ("Conexão falha!");
	$banco = mysqli_select_db($con, BD);
?>