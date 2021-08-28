<?php 
include_once("config/conexao.php");

            ini_set('display_errors', 0 );
            error_reporting(0);
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="aseets/img/66276.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <title>Lista de Tarefas</title>
</head>
<body>
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand">Pesquisar tarefas</a>
                <a href="cadastrar.php"> <button class="btn btn-outline-warning" type="submit">Cadastrar</button></a>
                <form class="form-inline" action="pesquisa.php" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Nome da Tarefa" aria-label="Search"
                           name="pesquisa">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            $pesquisar = $_POST['pesquisa'];
            $result_cursos = "SELECT * FROM tarefas WHERE tarefa LIKE '%$pesquisar%' ORDER BY data asc";
            $resultado_cursos = mysqli_query($conn, $result_cursos);
             ?>
            <?php while($dado = mysqli_fetch_assoc($resultado_cursos)){
                    $id = $dado["cod"];
                    $tarefa = $dado["tarefa"];
                    $desc = $dado["descricao"];
                    $prazo1 = $dado["data"];
                    date_default_timezone_set('America/Sao_Paulo');
                    setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
                    $prazo = strftime("%d-%m-%Y | %H:%M", strtotime($prazo1));
                    $prazoconta = strftime("%d-%m-%Y", strtotime($prazo1));
                    $hojeconta = date('d-m-y');
                    $dia = strftime("%d", strtotime($prazo1));    
                    $dia1 = date('d');
                    $mes = strftime("%m", strtotime($prazo1));
                    $mes1 = date('m');
                    $ano = strftime("%Y", strtotime($prazo1));
                    $ano1 = date('Y');
                    $calculo = $prazoconta - $hojeconta;
                    

                    echo "<div class='col-sm-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$tarefa</h5>
                                    <p class='card-text'>$desc</p>";
                                    if (($dia <= $dia1) && ($mes <= $mes1) && ($ano <= $ano1)){
                                        echo  "<p class='card-text' style='color: red;'> $prazo</p>";
                                      } else echo "<p class='card-text'> $prazo</p>";
                                      if(($mes1 > $mes) && ($ano1 > $ano)){
                                          echo "zero dias.";
                                      } else {
                                          $calculomes = $mes - $mes1;
                                          $calculomes2 = $calculomes * 30;
                                          $calculoano = $ano - $ano1;
                                          $calculoano1 = $calculoano * 365;
                                          $calculodia = $calculomes2 + $calculo + $calculoano1;  
                                          if(($calculodia < 0) && ($ano1 >= $ano)){echo "ATRASADA";}
                                          else{echo "falta $calculodia dias";}
                                          
                                      }
                                      
                                      echo "<br>";
                                      
                                   
                                    
                                    echo 
                                    "<div class='botoes' style='display: inline-flex; gap: 8px'>
                                    <a href='editar.php?id=$id' class='btn btn-success btn-sm'>Editar</a>       
                                    <a href='config/excluir.php?id=$id' class='btn btn-danger btn-sm'>Excluir</a>
                                    <a href='config/renovar.php?id=$id' class='btn btn-primary btn-sm'>+ 1 mês</a>
                                    </form>
                                    </div>
                                </div>
                            </div>
                    </div>";
                }
            ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
            </body>
    </html>
<?php 



?>