<?php
    //require "conexao.php";
    $situacao = "Funcionando";
    $id = $_GET['nome'];
    //$estado = $_GET['status_saida'];

    $consulta = "SELECT * FROM ferramenta";
    $pes = mysqli_query($con, $consulta);

    while($consulte = mysqli_fetch_assoc($pes)){

        if($consulte['status_saida'] == "Funcionando"){
            $situacao = "Defeituosa";
                $sqlF = "UPDATE ferramenta SET status_saida='".$situacao."' WHERE nome = '".$id."'";
                $queryF = mysqli_query($con, $sqlF);

            if ($queryF) {
                //echo "<script>alert('Atualizado com sucesso!')</script>";
                echo"<script>window.location = 'index.php'</script>";
            }
            else{
                echo '<script>alert("Ferramenta não Atualizada!")</script>';
            }
        }
        else if($consulte['status_saida'] == "Defeituosa" || $consulte['status_saida'] == "Manutenção"){
            $estado = "Funcionando";
                $sqlF = "UPDATE ferramenta SET status_saida='".$estado."' WHERE nome = '".$id."'";
                $queryF = mysqli_query($con, $sqlF);

            if ($queryF) {
                //echo "<script>alert('Atualizado com sucesso!')</script>";
                echo"<script>window.location = 'index.php'</script>";
            }
            else{
                echo '<script>alert("Ferramenta não Atualizada!")</script>';
            }
        }
    }
?>