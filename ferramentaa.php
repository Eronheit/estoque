<?php
    $sql = "SELECT * FROM ferramenta";  
    $query = mysqli_query($con, $sql);
    while($result = mysqli_fetch_assoc($query)){
        echo '
        <option>'.$result['nome'].' | '.$result['status_saida'].'</option>
        ';

        $id_ferramenta = $result['idferramenta'];
    }
?>