
    <?php
        if (isset($_POST['cadastrar'])) {
        require "conexao.php";
        $user = $_POST['user'];
        $empresa = $_POST['empresa'];
        $setor = $_POST['setor'];

                $sql = "INSERT INTO usuarios (nome, empresa, setor) VALUES ('".$user."', '".$empresa."', '".$setor."')";

                $query = mysqli_query($con, $sql);

                if ($query) {
                    echo "<script>alert('Usuário cadastrado!')</script>";
                    header("location:index.php");
                } else {
                echo "<script>alert('Erro ao cadastrar Usuário!')</script>";
                }
            }
    ?>	
  	