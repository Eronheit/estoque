<!DOCTYPE html>
<html>
<head>
	<title>Estoque</title>
	<meta charset="utf-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
    <link rel="icon" class="circle" href="img/icone.png"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css" media="screen">
    	body{background: #455a64;}
    </style>
</head>
<body class="blue-grey darken-4">
<div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <form class="login-form" method="post">
                    <div class="card">
                        <div class="card-image">
                            <img style="max-height:300px;" src="img/estoque.jpg">
                            <span class="card-title">
                            <h2>Login</h2>
                        </span>
                        </div>
                        <div class="card-content">
                            <div class="input-field">
                                <input class="validate" id="email" type="text" name="user">
                                <label for="email">Usuário</label>
                            </div>

                            <div class="row">
                                <div class="col s12 m8 l9">
                                    <div class="input-field">
                                        <input id="password" ng-model="password" type="password" name="senha">
                                        <label for="password">Senha</label>
                                    </div>
                                </div>
                                <div class="col s12 m4 l3">
                                    <div class="input-field">
                                        <label>
                                            <input type="checkbox" name="checkbox">
                                            <span>Lembrar</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action blue-grey lighten-3">
                            <div class="center-align">
                                <button class="btn blue-grey darken-1" name="logar"><i class="material-icons left">vpn_key</i>Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>     
		<?php

			if(isset($_POST['logar'])){
				require "conexao.php";
			    $user = $_POST['user'];
                $senha = $_POST['senha'];
                			    
			    session_start();

			    $adm = "SELECT * FROM admin WHERE usuario ='".$user."' AND senha = '".$senha."'";
			    $queryadm = mysqli_query($con, $adm);
			    
			    if(mysqli_num_rows($queryadm) > 0) {
			    //echo"<script>alert('oi')</script>";
			    	while ($result = mysqli_fetch_assoc($queryadm)) {
			    		$_SESSION['id'] = $result['idadmin'];
			    		$_SESSION['user']   = $result['usuario'];
			        	$_SESSION['pass']   = $result['senha'];
                    }
			        
			        header('location:cadFerramenta.php');
			    }
			    else{
			    
			    	unset($_SESSION['user']);
			    	header('location:login.php');
			    
			     }
			}
		?>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
</html>