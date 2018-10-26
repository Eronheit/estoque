<?php
    require "conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Usuário</title>
	<link rel="icon" class="circle" href="img/icone.png"/>
	<meta charset="utf-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css" media="screen">
    	body{background: #455a64;}
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <form class="login-form" method="post">
                    <div class="card">
                        <div class="card-header center">
                            <span class="card-title blue-text">
                                <h3 class="blue-text">Cadastrar Estoque</h3>
                            </span>
                        </div>
                        <div class="card-content">
                        <div class="input-field">
                            <select class="icons" name="nome">
                                <option disabled selected name="nome">Nome do Usuário</option>
                                <?php
                                
                                    $sqlUser = "SELECT * FROM usuarios";  
                                    $queryUser = mysqli_query($con, $sqlUser);
                                    while($result = mysqli_fetch_assoc($queryUser)){
                                        echo '
                                        <option>'.$result['nome'].'</option>
                                        ';

                                        //$id_usuario = $result['idusuario'];
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <select class="icons" name="ferramenta">
                                <option disabled selected name="ferramenta">Ferramenta</option>
                                <?php
                                
                                    $sql = "SELECT * FROM ferramenta";  
                                    $query = mysqli_query($con, $sql);
                                    while($result = mysqli_fetch_assoc($query)){
                                        echo '
                                            <option>'.$result['nome'].'</option>
                                        ';

                                        //$id_ferramenta = $result['idferramenta'];
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <select class="icons" name="empresa">
                                <option disabled selected name="empresa">Escolha uma empresa</option>
                                <option data-icon="img/Logo.jpg">AgriTech</option>
                                <option data-icon="img/download.png">Brisanet</option>
                                <option data-icon="img/p.jpg">Nossa Fruta</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <select class="icons" name="setor">
                                <option disabled selected name="setor">Setor</option>
                                <?php
                                
                                    $sql = "SELECT * FROM usuarios";  
                                    $query = mysqli_query($con, $sql);
                                    while($result = mysqli_fetch_assoc($query)){
                                        echo '
                                            <option>'.$result['setor'].'</option>
                                        ';

                                        //$id_ferramenta = $result['idferramenta'];
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <select class="icons" name="condicao">
                                <option disabled selected name="condicao">Estado da Ferramenta</option>
                                <option>Funcionando</option>
                                <option>Defeituosa</option>
                            </select>
                        </div>
                        </div>
                        <div class="card-action blue-grey lighten-3">
                            <div class="center-align">
                                <button class="btn blue-grey darken-1" name="cadastrar"><i class="material-icons left">dehaze</i>Cadastrar</button>
                                <a class="btn red accent-4" href="index.php"><i class="material-icons left">arrow_left</i>Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
		<?php
		    if (isset($_POST['cadastrar'])) {
                //header('location:index.php');  
                
                $nome = $_POST['nome'];
                $ferramenta = $_POST['ferramenta'];
                $empresa = $_POST['empresa'];
                $setor = $_POST['setor'];
                $condicao = $_POST['condicao'];

                    $sqlE = "INSERT INTO alocacao (ferramenta, usuario, empresa, setor, status_saida) VALUES ('".$ferramenta."', '".$nome."','".$empresa."', '".$setor."', '".$condicao."')";
                    $queryE = mysqli_query($con, $sqlE);

                    $situacao = 1;
                    $sqlF = "UPDATE ferramenta SET situacao='".$situacao."' WHERE nome = '".$ferramenta."'";
                    $queryF = mysqli_query($con, $sqlF);

		          if ($queryE > 0 && $queryF > 0) {
		            echo "<script>alert('Alocação cadastrado!')</script>";
		          } else {
		            echo "<script>alert('Erro ao cadastrar Alocação!')</script>";
		          }
            }
		?>	
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>