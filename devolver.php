<table class="white-text">
        <thead>
          <tr>
              <th>Ferramenta</th>
              <th>Quantidade</th>
              <th>Responsável</th>
              <th>Empresa</th>
              <th>Setor</th>
              <th>Data Alocada</th>
              <th>Estado</th>
              <th>Ação</th>              
          </tr>
        </thead>

        <tbody>
        <?php
            $sql = "SELECT * FROM alocacao";
            $query = mysqli_query($con, $sql);
            while($result = mysqli_fetch_assoc($query)){
                echo"
                    <tr>
                        <td>".$result['ferramenta']."</td>
                        <td>".$result['qnt']." ".$result['sigla']."</td>
                        <td>".$result['usuario']."</td>
                        <td>".$result['empresa']."</td>
                        <td>".$result['setor']."</td>
                        <td>".$result['data_saida']."</td>
                        <td>".$result['status_saida']."</td>
                        <td><a class='btn orange accent-4' href='ExcluirEstoque.php?idalocacao=".$result['idalocacao']."&&ferramenta=".$result['ferramenta']."&&qnt=".$result['qnt']."'>Devolver</a></td>
                    </tr>
                ";
                //<a href='ExcluirEstoque.php?idalocacao=".$result['idalocacao']."&&ferramenta=".$result['ferramenta']."'>Devolver</a>

            }
        ?>
        </tbody>
      </table>
