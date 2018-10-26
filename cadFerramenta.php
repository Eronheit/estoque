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
                            <h3 class="blue-text">Cadastrar Ferramenta</h3>
                        </span>
                        </div>
                        <div class="card-content">
                            <div class="input-field">
                                <input id="icon_prefix" type="text" name="nome" class="validate" data-length="15">
		                        <label for="icon_prefix">Nome da ferramenta</label>
                            </div>
                            <div class="row">
                                <div class="col s12 m8 l9">
                                <div class="input-field">
                                    <select class="icons" name="condicao">
                                        <option disabled selected name="condicao">Estado da Ferramenta</option>
                                        <option>Funcionando</option>
                                        <option>Defeituosa</option>
                                        <option>Manutenção</option>
                                    </select>
                                </div>
                                </div>
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
            require "conexao.php";
            $nome = $_POST['nome'];
            $situacao = 0;
		    $condicao = $_POST['condicao'];

		          $sql = "INSERT INTO ferramenta (nome, situacao, status_saida) VALUES ('".$nome."', ".$situacao.",'".$condicao."')";

		          $query = mysqli_query($con, $sql);

		          if ($query) {
		            echo "<script>alert('Ferramenta cadastrado!')</script>";
		          } else {
		            echo "<script>alert('Erro ao cadastrar Ferramenta!')</script>";
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