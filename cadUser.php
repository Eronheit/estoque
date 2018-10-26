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
                            <h3 class="blue-text">Cadastrar Usuário</h3>
                        </span>
                        </div>
                        <div class="card-content">
                            <div class="input-field">
                                <input id="icon_prefix" type="text" name="user" class="validate" data-length="15">
		                        <label for="icon_prefix">Usuário</label>
                            </div>
                            <div class="row">
                                <div class="col s12 m8 l9">
                                <div class="input-field">
                                    <select class="icons" name="empresa">
                                    <option disabled selected name="empresa">Escolha uma empresa</option>
                                    <option data-icon="img/Logo.jpg">AgriTech</option>
                                    <option data-icon="img/download.png">Brisanet</option>
                                    <option data-icon="img/p.jpg">Nossa Fruta</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <input id="icon_prefix" type="text" name="setor" class="validate" data-length="15">
		                            <label for="icon_prefix">Setor</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action blue-grey lighten-3">
                            <div class="center-align">
                                <button class="btn blue-grey darken-1" name="cadastrar"><i class="material-icons left">dehaze</i>Cadastrar</button>
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
		    $user = $_POST['user'];
            $empresa = $_POST['empresa'];
            $setor = $_POST['setor'];

		          $sql = "INSERT INTO usuarios (nome, empresa, setor) VALUES ('".$user."', '".$empresa."', '".$setor."')";

		          $query = mysqli_query($con, $sql);

		          if ($query) {
		            echo "<script>alert('Usuário cadastrado!')</script>";
		          } else {
		            echo "<script>alert('Erro ao cadastrar Usuário!')</script>";
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