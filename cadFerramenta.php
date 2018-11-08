<?php
    if (isset($_POST['cadastrar'])) {
        require "conexao.php";
            $nome = $_POST['nome'];
            $situacao = 0;
            $condicao = $_POST['condicao'];
            $qnt = $_POST['qnt'];

        $sql = "INSERT INTO ferramenta (nome, qnt, situacao, status_saida) VALUES ('".$nome."', '".$qnt."', '".$situacao."','".$condicao."')";

        $query = mysqli_query($con, $sql);

            if ($query) {
                echo "<script>alert('Ferramenta cadastrado!')</script>";
                header('location:index.php');
            } else {
                echo "<script>alert('Erro ao cadastrar Ferramenta!')</script>";
            }
    }
?>
