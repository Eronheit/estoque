<?php
	require("conexao.php");
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AgriTech</title>
    <meta charset="utf-8">
    <link rel="icon" class="circle" href="img/icone.png"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="index/index.css">
  </head>

  <body style="background-image: url('img/estoque.jpg'); background-position: fixed;">
    <!-- github fork banner -->
    <ul id="slide-out" class="side-nav fixed blue-grey darken-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="img/photo1.png">
          </div>
          <a href="#!user"><img class="circle" src="img/Logo.jpg"></a>
          <a href="#!name"><span class="white-text name">Gerencie bem suas ferramentas,</span></a>
          <a href="#!email"><span class="white-text email">
              <?php
                if(isset($_SESSION['user'])){ 
                    $logado = $_SESSION['user'];
                    echo $logado;
                }else{
                    echo"Walter O'Brien";
                }
              ?>!
            </span>
          </a>
        </div>
      </li>

      <li><a class="active white-text" href="login.php"><i class="material-icons green-text">reply</i>Sair</a></li>
      <li><div class="divider"></div></li>

      <li><a class="subheader white-text">Gestão</a></li>
      
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          
          <li id="li-parcela">
            <input type="hidden" id="field-id" value="" />
            <a class="master-menu waves-effect white-text">Ferramenta
                <i class="material-icons green-text" >add</i>
            </a>
            <ul class="child-menu blue-grey darken-3" style="border-top: 1px #222 solid;display: none;">
                <li style="text-indent: 30px;">
                    <a href="?id=conFerramenta">
                        <span class="white-text">Ferramenta</span>
                        <i class="material-icons right white-text">build</i>
                    </a>
                </li>
                <li style="text-indent: 30px;">
                    <a class="modal-trigger" href="#ferramenta">
                        <span class="white-text">Cadastrar</span>
                        <i class="material-icons right white-text">done</i>
                    </a>
                </li>
            </ul>
          </li>
        
        <li id="li-bloco">
            <input type="hidden" id="field-id_bloco" value="" />
            <a class="master-menu waves-effect white-text">Usuário
                <i class="material-icons green-text ">add</i>
            </a>
            <ul class="child-menu blue-grey darken-3" style="border-top: 1px #222 solid;display: none;">
                <li style="text-indent: 30px;">
                    <a href="?id=conUser">
                        <span class="white-text">Usuário</span>
                        <i class="material-icons right white-text">person</i>
                    </a>
                </li>
                <li style="text-indent: 30px;">
                    <a class="modal-trigger" href="#user">
                        <span class="white-text">Cadastrar</span>
                        <i class="material-icons right white-text">person_add</i>
                    </a>
                </li>
            </ul>
        </li>
        </ul>
      </li>
    </ul>
    
    <div id="ferramenta" class="modal center">
        <div class="modal-content">
            <h4><b class="light-blue-text">Cadastrar Ferramenta</b></h4>
            <form class="col s12 form" method="POST" action="cadFerramenta.php">
                <div class="container">
                    <div class="container">
                        <div class="input-field">
                            <input id="icon_prefix" type="text" name="nome" class="validate" data-length="15">
                            <label for="icon_prefix">Nome da ferramenta</label>
                        </div>
                            
                        <div class="input-field col s12 m6">
                            <input type="select" id="cond" name="condicao" list="Condicao" placeholder="Estado da Ferramenta" class="validate">
                            <datalist id="Condicao">
                                <option>Funcionando</option>
                                <option>Defeituosa</option>
                                <option>Manutenção</option>
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="cadastrar" class="modal-close green teal-4 btn-flat"><i class="material-icons right">arrow_right</i>Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    
    <div id="user" class="modal center">
        <div class="modal-content">
            <h4><b class="light-blue-text">Cadastrar Usuário</b></h4>
            <form class="col s12 form" method="POST" action="cadUser.php">
                <div class="container">
                    <div class="container">
                        <div class="input-field">
                            <input id="icon_prefix" type="text" name="user" class="validate" data-length="15">
                            <label for="icon_prefix">Nome do Usuário</label>
                        </div>
                        <div class="input-field">
                            <input id="icon_prefix" type="text" name="setor" class="validate" data-length="15">
                            <label for="icon_prefix">Setor</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input type="select" id="cond" name="empresa" list="Empresa" placeholder="Empresa" class="validate">
                            <datalist id="Empresa">
                                <option data-icon="img/Logo.jpg">AgriTech</option>
                                <option data-icon="img/download.png">Brisanet</option>
                                <option data-icon="img/p.jpg">Nossa Fruta</option>
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="cadastrar" class="modal-close green teal-4 btn-flat"><i class="material-icons right">arrow_right</i>Cadastrar</button>
                </div>
            </form>
        </div>
    </div>


    <main>
    <section class="content">
      <div class="page-announce valign-wrapper blue-grey darken-4"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons greenIcon">dehaze</i></a><h2 class="header">
        <a>
            <b class="typewrite" data-period="2000" data-type='[ "Gerenciamento", "Estoque", "Gerenciamento de Estoque" ]'></b>
        </a>
    </h2></div>
      <div class="row">
            <div class="col l4 s12">
                <div class="small-box blue-grey darken-4">
                <div class="inner">
                    <h3><?php
                        $sql = "SELECT * FROM alocacao";
                        $query = mysqli_query($con, $sql);
                        echo mysqli_num_rows($query);
                    ?></h3>
                    <p>Alocados</p>
                </div>
                <div class="icon">
                    <i class="ion-ios-folder"></i>
                </div>
                    <a href="?id=GerenciarEstoque" class="small-box-footer" class="animsition-link">Informações<i class="fa fa-arrow-circle-right"></i></a>
                </div>
          </div>
          <div class="col l4 s12">
            <div class="small-box blue-grey darken-4">
              <div class="inner">
                <h3><?php
                    $sql = "SELECT * FROM ferramenta";
                    $query = mysqli_query($con, $sql);
                    echo mysqli_num_rows($query);
                ?></h3>
                <p>Ferramentas</p>
              </div>
              <div class="icon">
                <i class="ion-pin"></i>
              </div>
                <a href="?id=conFerramenta" class="small-box-footer" class="animsition-link">Informações<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col l4 s12">
            <div class="small-box blue-grey darken-4">
              <div class="inner">
                <h3><?php
                    $sql = "SELECT * FROM usuarios";
                    $query = mysqli_query($con, $sql);
                    echo mysqli_num_rows($query);
                ?></h3>
                <p>Usuários</p>
              </div>
              <div class="icon">
                <i class="ion-ios-people"></i>
              </div>
                <a href="?id=conUser" class="small-box-footer" class="animsition-link">Informações<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="container">
          <!-- <div class="quick-links center-align">
            <h3>Quick Links</h3>
            <div class="row">
              <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Mod Handbook"><a class="waves-effect waves-light btn-large" href="#">Mod Handbook</a></div>
              <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Staff Applications"><a class="waves-effect waves-light btn-large" href="#">Staff Applications</a></div>
              <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Name Guidelines"><a class="waves-effect waves-light btn-large" href="#">User Guidelines</a></div>
              <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Issue Tracker"><a class="waves-effect waves-light btn-large" href="#">Issue Tracker</a></div>
              <div class="col l4 offset-l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="OTRS Support Site"><a class="waves-effect waves-light btn-large" href="#">Support Site</a></div>
            </div>
          </div> -->

          
          <div class="custom-responsive center" style="padding-top:10px; padding-left:10px; padding-right:10px; background: rgba(0, 0, 0, 0.7); border-radius: 5px;">
            <h3 class="center-align green-text">Gerenciamento de Estoque</h3>
            
            <div>
            <?php

                if (isset($_GET['id'])) {
                    $page = $_GET['id'];
                    include $page.'.php';
                }
                else{
                    include("conFerramenta.php");
                }
            ?>
            </div>
        </div>
    </section>
    <br>
  </main>
        <footer class="page-footer blue-grey darken-4" style="margin-top: -20px;">
          <div class="footer-copyright">
            <div class="container">
              © 2018 Agritech Semiárido. Gerenciamento de Estoque.
            </div>
          </div>
        </footer>

          <div class="fixed-action-btn horizontal tooltipped" data-position="top" dattooltipped data-position="top" data-delay="50" data-tooltip="Alocação">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">build</i>
            </a>
            <ul>
              <li><a class="btn-floating green tooltipped" data-position="top" data-delay="50" data-tooltip="Visualizar Alocação" href="?id=GerenciarEstoque"><i class="material-icons">visibility</i></a></li>
              <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Devolver Ferramenta" href="?id=devolver"><i class="material-icons">check_circle</i></a></li>
              <li><a class="btn-floating orange tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar Alocação" href="?id=alocar"><i class="material-icons">add_circle</i></a></li>
            </ul>
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <script src="js/utils.js"></script>
        <script>
          // Hide sideNav
          $('.button-collapse').sideNav({
          menuWidth: 300, // Default is 300
          edge: 'left', // Choose the horizontal origin
          closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true // Choose whether you can drag to open on touch screens
            });
            $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
            });
            $('select').material_select();
            $('.collapsible').collapsible();
            $(document).ready(function(){
                $('select').formSelect();
            });
            $(document).ready(function(){
                $('.fixed-action-btn').floatingActionButton();
            });
            </script>
      </body>
    </html>
