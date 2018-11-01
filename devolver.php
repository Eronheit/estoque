<table class="white-text">
        <thead>
          <tr>
              <th>Ferramenta</th>
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
                        <td>".$result['usuario']."</td>
                        <td>".$result['empresa']."</td>
                        <td>".$result['setor']."</td>
                        <td>".$result['data_saida']."</td>
                        <td>".$result['status_saida']."</td>
                        <td><a class='btn teal darken-4 modal-trigger' href='#modal1' class='modal-close waves-effect waves-green btn-flat'>Devolver</a></td>
                    </tr>
                    <div id='modal1' class='modal' style='height:230px'>
                    <form method='get' action='ExcluirEstoque.php'>
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
                            <button name='devolver' type='submit' class='modal-close waves-effect waves-green btn-flat'>Devolver</button>
                            </div>
                        </form>
                    </div>
                ";
                //<a href='ExcluirEstoque.php?idalocacao=".$result['idalocacao']."&&ferramenta=".$result['ferramenta']."'>Devolver</a>

            }
        ?>
        </tbody>
      </table>
