<table class="white-text">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Empresa</th>
            <th>Setor</th>
            <!-- <th>Ação</th>               -->
        </tr>
    </thead>

    <tbody>
    <?php
        
        $sql = "SELECT * FROM usuarios";
        
        $query = mysqli_query($con, $sql);
        
        while($result = mysqli_fetch_assoc($query)){
        
            echo"
                <tr>
                    <td>".$result['nome']."</td>
                    <td>".$result['empresa']."</td>
                    <td>".$result['setor']."</td>
            ";
        
            // $user = "SELECT * FROM alocacao";
        
            // $users = mysqli_query($con, $user);
        
            // while($resposta = mysqli_fetch_assoc($users)){
            //         if(($resposta['nome'] != $result['nome']) && ($resposta['empresa'] != $result['empresa']) && ($resposta['setor'] != $result['setor'])){
            //             echo"<td><a href='ExcluirUser.php?idusuario=".$result['idusuario']."' class='btn orange accent-4'><i class='material-icons'>delete</i></a></td>";
            //         }
            // }
        
                echo"</tr>";
        
        }
    ?>
    </tbody>
</table>