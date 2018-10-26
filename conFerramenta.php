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
        <h2>Gerenciamento de Ferramentas</h2>
    </div>
    <table class="highlight">
        <thead>
          <tr>
              <th>Ferramenta</th>
              <th>Status de Saída</th>
              <th>Ação</th>              
          </tr>
        </thead>

        <tbody>
        <?php
            require "conexao.php";
            $sql = "SELECT * FROM ferramenta";
            $query = mysqli_query($con, $sql);
            while($result = mysqli_fetch_assoc($query)){
                echo"
                    <tr>
                        <td>".$result['nome']."</td>
                        <td>".$result['status_saida']."</td>
                ";
                if($result['situacao'] == "0" && $result['status_saida'] == "Funcionando"){
                    echo"<td><a href='alocar.php' class='btn teal darken-4' style='width:200px;'><i class='material-icons right'>check</i>Disponivel</a></td>";
                }elseif($result['situacao'] == "1"){
                    echo"<td><a href='index.php' class='btn red accent-4' style='width:200px;'><i class='material-icons right'>close</i>Alocado</a></td>";
                }elseif($result['status_saida'] == "Defeituosa" || $result['status_saida'] == "Manutenção"){
                    echo"<td><a class='btn blue-grey darken-4' style='width:200px;'><i class='material-icons right'>build</i>Manutenção</a></td>";
                }
                echo"</tr>";
            }
        ?>
        </tbody>
      </table>
    </div>
  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
</html>