<?php 
    require 'conexao.php';
    $id = $_GET['idusuario'];
	$sql = "DELETE FROM usuarios WHERE idusuario = '".$id."'";
	$query = mysqli_query($con, $sql);

	if ($query > 0) {
		echo "<script>alert('Excluido com sucesso!')</script>";
		header("location:index.php");
	}
	else{
		echo "Não deu!";
	}
?>