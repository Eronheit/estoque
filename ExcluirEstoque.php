<?php 
		require "conexao.php";
		$ferramenta = $_GET['ferramenta'];
		$id = $_GET['idalocacao'];
		$qntP = $_GET['qnt'];
		
		$sql = "DELETE FROM alocacao WHERE idalocacao = ".$id."";
		$query = mysqli_query($con, $sql);
		
		$situacao = 0;

		$pesquisa = "SELECT * FROM ferramenta";
		$consulta = mysqli_query($con, $pesquisa);
		$result = mysqli_fetch_assoc($consulta); 
		$qnt = $result['qnt'];

		$total = $qnt + $qntP;

		$sqlF = "UPDATE ferramenta SET qnt='".$total."', situacao='".$situacao."' WHERE nome = '".$ferramenta."'";
		$queryF = mysqli_query($con, $sqlF);

		if ($query > 0 && $queryF) {
			echo "<script>alert('Atualizado com sucesso!')</script>";
			header("location:index.php?id=devolver");
		}
		else{
			echo '<script>alert("Ferramenta não pode ser devolvida Defeituosa!")</script>';
		}
?>