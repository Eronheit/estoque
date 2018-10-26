<!DOCTYPE html>
<html>
<head>
	<title>Gerenciamento de Estoque</title>
	<link rel="icon" class="circle" href="img/icone.png"/>
	<meta charset="utf-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="header center">
        <h2>Gerenciamento de Estoque</h2>
    </div>
    <table class="highlight">
        <thead>
          <tr>
              <th>Ferramenta</th>
              <th>Responsável</th>
              <th>Empresa</th>
              <th>Setor</th>
              <th>Data Alocada</th>
              <th>Status de Saída</th>
              <th>Ação</th>              
          </tr>
        </thead>

        <tbody>
        <?php
            require "conexao.php";
            $sql = "SELECT * FROM alocacao";
            $query = mysqli_query($con, $sql);
            while($result = mysqli_fetch_assoc($query)){
                echo"
                    <tr>
                        <td>".$result['ferramenta']."</td>
                        <td>".$result['usuario']."</td>
                        <td>".$result['empresa']."</td>
                        <td>".$result['setor']."</td>
                        <td>".$result['data_saida']."</td>
                        <td>".$result['status_saida']."</td>
                        <td><a class='btn teal darken-4 modal-trigger' href='#modal1'><i class='material-icons right'>cached</i>Devolver</a></td>
                        <div id='modal1' class='modal' style='height:230px;'>
                        <form method='post' action='ExcluirEstoque.php'>
                        <div class='modal-content'>
                            <div class='input-field'>
                                <select class='icons' name='condicao'>
                                    <option disabled selected name='condicao'>Estado da Ferramenta</option>
                                    <option>Funcionando</option>
                                    <option>Defeituosa</option>
                                </select>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <a name='devolver' href='ExcluirEstoque.php?idalocacao=".$result['idalocacao']."&&ferramenta=".$result['ferramenta']."' class='modal-close waves-effect waves-green btn-flat'>Devolver</a>
                        </div>
                        </form>
                        </div>
                    </tr>
                ";
            }
        ?>
        </tbody>
      </table>
    </div>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>