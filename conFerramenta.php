<table class="white-text">
    <thead>
        <tr>
            <th>Ferramenta</th>
            <th>Status de Saída</th>
            <th>Ação</th>              
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
                    <td>".$result['status_saida']."</td>
                    <td>
            ";
            if($result['situacao'] == "0" && $result['status_saida'] == "Funcionando"){
                echo"<a href='alocar.php' class='btn teal darken-4' style='width:250px; margin-right:10px;'><i class='material-icons right'>check</i>Disponivel</a>";
                //echo"<a href='ExcluirFerramenta.php?id=".$result['idferramenta']."'  class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
            }elseif($result['situacao'] == "1"){
                echo"<a href='index.php' class='btn red accent-4' style='width:250px; margin-right:10px;'><i class='material-icons right'>close</i>Alocado</a>";
                //echo"<a href='ExcluirFerramenta.php?id=".$result['idferramenta']."' class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
            }elseif($result['status_saida'] == "Defeituosa" || $result['status_saida'] == "Manutenção"){
                echo"<a class='btn blue-grey darken-4' style='width:250px; margin-right:10px;'><i class='material-icons right'>build</i>Manutenção</a>";
                //echo"<a href='ExcluirFerramenta.php?id=".$result['idferramenta']."' class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
            }
            if($result['situacao'] != "1"){
                echo"<a href='ExcluirFerramenta.php?idferramenta=".$result['idferramenta']."' class='btn orange accent-4'><i class='material-icons'>delete</i></a>";
            }
            echo"</td></tr>";
        }
    ?>
    </tbody>
</table>