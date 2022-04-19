<?php 
include_once("config/conexao.php");

       ini_set('display_errors', 0 );
        error_reporting(0);


            $result_cursos5 = "SELECT * FROM anotacoes WHERE id = 1";
            $resultado_cursos5 = mysqli_query($conn, $result_cursos5);
            $result_cursos6 = "SELECT * FROM anotacoes WHERE id = 1";
            $resultado_cursos6 = mysqli_query($conn, $result_cursos6);

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="assets/img/66276.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/style.css">
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
                    $prazoconta = strftime("%d-%m-%y", strtotime($prazo1));
                    $hojeconta = date('d-m-y');
                    $hojeteste = date('Y-m-d H:i:s');
                    $today = date('Y-m-d');
                    $last = strftime("%Y-%m-%d", strtotime($prazo1));
                    

                    echo "<div class='col-sm-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$tarefa</h5>
                                    <p class='card-text'>$desc</p>";
                                    if (strtotime($prazo1) < strtotime($hojeteste)){
                                        echo  "<p class='card-text' style='color: red;'> $prazo</p>";
                                       
                                    } else echo "<p class='card-text'> $prazo</p>";
                                    $diferenca = strtotime($today) - strtotime($last);
                                    $dias = floor($diferenca / (60 * 60 * 24));
                                    $auxdias = $dias * -1;
                                    if($auxdias < 0){
                                        echo "ATRASADA";
                                    }else if($auxdias == 0){
                                        echo "VENCE HOJE";
                                    }else  echo "falta $auxdias dias";
                                    
                                      
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
    <div class="card teste" style="min-width: 370px;">
  <div class="card-body">
    <h5 class="card-title">Anotações:</h5>
    <div class="form-floating">
        <form action="anot.php" method="post" id="form">
  <textarea class="form-control" style="height: 550px" name="anot" form="form"><?php while($dado5 = mysqli_fetch_assoc($resultado_cursos5)){ echo $dado5["anotacao"];}?></textarea><br>
  <figcaption class="figure-caption text-right"><?php while($dado6 = mysqli_fetch_assoc($resultado_cursos6)){ echo $dado6["modificado"];}?></figcaption>
  <input type="submit" value="Enviar" class="btn btn-outline-primary">
  </form>
</div>
  </div>
</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
            </body>
            <footer class="footer cadastro">
<a href="https://instagram.com/douglaseduar"><h3>Douglas</h3></a>
</footer>
    </html>