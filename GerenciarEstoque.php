    <table class="white-text">
        <thead>
          <tr>
              <th>Ferramenta</th>
              <th>Responsável</th>
              <th>Empresa</th>
              <th>Setor</th>
              <th>Data Alocada</th>
              <th>Status de Saída</th>            
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
                        <td>".$result['usuario']."</td>
                        <td>".$result['empresa']."</td>
                        <td>".$result['setor']."</td>
                        <td>".$result['data_saida']."</td>
                        <td>".$result['status_saida']."</td>
                    </tr>
                ";
            }
        ?>
        </tbody>
      </table>
