<div class="row">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <form class="login-form" method="post">
                    <div class="card">
                        <div class="card-content">
                        <div class="input-field">
                        
                            <select class="icons" id="select" name="nome">
                                <option disabled selected name="nome">Nome do Usuário</option>
                            <?php            
                                    $sqlUser = "SELECT * FROM usuarios";  
                                    $queryUser = mysqli_query($con, $sqlUser);
                                    while($result = mysqli_fetch_assoc($queryUser)){
                                        echo '
                                        <option>'.$result['nome'].'</option>
                                        ';

                                    }
                            ?>
                        </select>
                        </div>
                        <div class="input-field">
                            <select class="icons" name="ferramenta">
                                <option disabled selected name="ferramenta">Ferramenta</option>
                                <?php
                                
                                    $sql = "SELECT * FROM ferramenta WHERE status_saida = 'Funcionando' AND qnt > '0'";  
                                    $query = mysqli_query($con, $sql);
                                    while($result = mysqli_fetch_assoc($query)){
                                        echo '
                                            <option>'.$result['nome'].'</option>
                                        ';

                                        //$id_ferramenta = $result['idferramenta'];
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <input id="icon_prefix" type="number" name="qntP" class="validate" data-length="15">
                            <label for="icon_prefix">Quantidade</label>
                        </div> 
                        </div>
                        <div class="card-action blue-grey lighten-3">
                            <div class="center-align">
                                <button class="btn blue-grey darken-1" name="cadastrar"><i class="material-icons left">dehaze</i>Cadastrar</button>
                                <a class="btn red accent-4" href="index.php"><i class="material-icons left">arrow_left</i>Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
		<?php
		    if (isset($_POST['cadastrar'])) {
                    error_reporting(0);
                    $ferramenta = $_POST['ferramenta'];
                    $qntP = $_POST['qntP'];

                    $sql = "SELECT * FROM ferramenta WHERE nome = '".$ferramenta."'";
                    $query = mysqli_query($con, $sql);

                    $resultadoF = mysqli_fetch_assoc($query);

                    if ($resultadoF['view'] != "0"){   
                        if($resultadoF['status_saida'] == "Funcionando"){
                            $objeto = $resultadoF['nome'];
                            $condicao = $resultadoF['status_saida'];
                            $qnt = $resultadoF['qnt'];
                            $sigla = $resultadoF['sigla'];
    
                            $situacao = 1;
                            $total = $qnt - $qntP;
                            $view = $resultadoF['view'];
                            $tview = $view + 1;
                            if($total > -1){
                                $sqlF = "UPDATE ferramenta SET situacao='".$situacao."', qnt='".$total."', view='".$tview."' WHERE nome = '".$objeto."'";
                                $queryF = mysqli_query($con, $sqlF);
    
                                $sqlA = "INSERT INTO alocacao (ferramenta, qnt, sigla, status_saida) VALUES ('".$objeto."', '".$qntP."', '".$sigla."', '".$condicao."')";
                                $queryA = mysqli_query($con, $sqlA);
    
                                $sqlH = "INSERT INTO historico (ferramenta, qnt, sigla, status_saida) VALUES ('".$objeto."', '".$qntP."', '".$sigla."', '".$condicao."')";
                                $queryH = mysqli_query($con, $sqlH);
    
                                if ($queryF > 0 && $queryA > 0 && $queryH > 0) {
    
                                    $u = $_POST['nome'];
                                    
                                    $user = "SELECT * FROM usuarios WHERE nome = '".$u."'";
                                    $pesquisa = mysqli_query($con, $user);
                                    $resultadoU = mysqli_fetch_assoc($pesquisa);
    
                                    if($pesquisa > 0){
    
                                        $f = $_POST['ferramenta'];
                                        $cliente = $resultadoU['nome'];
                                        $emp = $resultadoU['empresa'];
                                        $setor = $resultadoU['setor'];  
                                        //parei aqui!!!!!!!
                                        $sqlW = "UPDATE alocacao SET usuario='".$cliente."', empresa='".$emp."', setor='".$setor."' WHERE ferramenta = '".$f."' AND qnt = '".$total."'";
                                        $queryW = mysqli_query($con, $sqlW);
    
                                        $sqlHH = "UPDATE historico SET usuario='".$cliente."', empresa='".$emp."', setor='".$setor."' WHERE ferramenta = '".$f."' AND qnt = '".$total."'";
                                        $queryHH = mysqli_query($con, $sqlHH);
    
                                            if($queryW > 0 && $queryHH > 0){
                                                echo "<script>alert('Alocação cadastrado!')</script>";
                                            }else{
                                                echo "<script>alert('Erro no Update da alocação!')</script>";
                                            }
                                    }
                                } else {
                                    echo "<script>alert('Erro ao cadastrar Alocação!')</script>";
                                }
                            }else{
                                echo "<script>alert('Não tem quantidade de ferramenta disponivel!')</script>";
                            }
                        }
                    }else if($resultadoF['view'] == "0"){
                        if($resultadoF['status_saida'] == "Funcionando"){
                            $objeto = $resultadoF['nome'];
                            $condicao = $resultadoF['status_saida'];
                            $qnt = $resultadoF['qnt'];
                            $sigla = $resultadoF['sigla'];

                            $situacao = 1;
                            $total = $qnt - $qntP;
                            $view = $resultadoF['view'];
                            $tview = $view + 1;
                            if($total > -1){
                            $sqlF = "UPDATE ferramenta SET qnt = '".$total."', situacao='".$situacao."', view='".$tview."' WHERE nome = '".$objeto."'";
                            $queryF = mysqli_query($con, $sqlF);

                            $sqlA = "INSERT INTO alocacao (ferramenta, qnt, sigla, status_saida) VALUES ('".$objeto."', '".$qntP."', '".$sigla."', '".$condicao."')";
                            $queryA = mysqli_query($con, $sqlA);

                            $sqlH = "INSERT INTO historico (ferramenta, qnt, sigla, status_saida) VALUES ('".$objeto."', '".$qntP."', '".$sigla."', '".$condicao."')";
                            $queryH = mysqli_query($con, $sqlH);

                            if ($queryF > 0 && $queryA > 0 && $queryH > 0) {

                                $u = $_POST['nome'];
                                
                                $user = "SELECT * FROM usuarios WHERE nome = '".$u."'";
                                $pesquisa = mysqli_query($con, $user);
                                $resultadoU = mysqli_fetch_assoc($pesquisa);

                                if($pesquisa > 0){
                                    $f = $_POST['ferramenta'];
                                    $cliente = $resultadoU['nome'];
                                    $emp = $resultadoU['empresa'];
                                    $setor = $resultadoU['setor'];  

                                    $sqlW = "UPDATE alocacao SET usuario='".$cliente."', empresa='".$emp."', setor='".$setor."' WHERE ferramenta = '".$f."'";
                                    $queryW = mysqli_query($con, $sqlW);

                                    $sqlHH = "UPDATE historico SET usuario='".$cliente."', empresa='".$emp."', setor='".$setor."' WHERE ferramenta = '".$f."'";
                                    $queryHH = mysqli_query($con, $sqlHH);

                                        if($queryW > 0 && $queryHH > 0){
                                            echo "<script>alert('Alocação cadastrado!')</script>";
                                        }else{
                                            echo "<script>alert('Erro no Update da alocação!')</script>";
                                        }
                                }
                            } else {
                                echo "<script>alert('Erro ao cadastrar Alocação!')</script>";
                            }
                        }
                        }
                    }
                }
                    
        ?>	