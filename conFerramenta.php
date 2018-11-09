<table class="white-text">
    <thead>
        <tr>
            <th>Ferramenta</th>
            <th>Quantidade</th>
            <th>Status de Saída</th>
            <th>Estado</th>
            <th>Excluir</th>
            <th>Atualizar</th>              
        </tr>
    </thead>

    <tbody>
    <?php
        $sql = "SELECT * FROM ferramenta";
        $query = mysqli_query($con, $sql);
        while($result = mysqli_fetch_assoc($query)){
            echo"
                <tr>
                    <td>".$result['nome']."</td>
                    <td>".$result['qnt']." ".$result['sigla']."</td>
                    <td>".$result['status_saida']."</td>
            ";
            if($result['situacao'] == "0" && $result['status_saida'] == "Funcionando"){
                echo"<td><a href='?id=alocar' class='btn teal darken-4' style='width:250px; margin-right:10px;'><i class='material-icons right'>check</i>Disponivel</a></td>";
                //echo"<a href='ExcluirFerramenta.php?id=".$result['idferramenta']."'  class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
            }elseif($result['situacao'] == "1"){
                echo"<td><a href='?id=devolver' class='btn red accent-4' style='width:250px; margin-right:10px;'><i class='material-icons right'>close</i>Alocado</a></td>";
                //echo"<a href='ExcluirFerramenta.php?id=".$result['idferramenta']."' class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
            }elseif($result['status_saida'] == "Defeituosa" || $result['status_saida'] == "Manutenção"){
                echo"<td><a class='btn blue-grey darken-4' style='width:250px; margin-right:10px;'><i class='material-icons right'>build</i>Manutenção</a></td>";
            }
            if($result['situacao'] != "1"){
                echo"<td><a href='ExcluirFerramenta.php?idferramenta=".$result['idferramenta']."' class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
                if($result['status_saida'] == "Defeituosa" || $result['status_saida'] == "Manutenção" || $result['status_saida'] == "Funcionando"){ 
                    if($result['situacao'] == "0"){
                        echo"<td><a href='?id=update&&nome=".$result['nome']."' class='btn cyan darken-4'><i class='material-icons'>cached</i></a></td>";
                    }
                }
            }
            echo"</tr>";
        }
    ?>
    </tbody>
</table>