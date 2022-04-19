<?php 
include_once("config/conexao.php");

$result_usuarios = "SELECT * FROM tarefas";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);
$conta_linhas = mysqli_num_rows($resultado_usuarios);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Tarefas - HOME</title>
        <link rel="shortcut icon" href="assets/img/66276.png"/>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body style="background: #dedede">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 20rem; display: block; margin: 12rem auto 0 auto;">
                    <div class="card-body">
                        <h3 class="card-title"><b>Bem-vindo!</b></h3>
                        <p class="card-text">Acesse sua lista ou cadastre uma nova tarefa para seu dia-a-dia.</p>
                        <a href="cadastrar.php" class="btn btn-primary" style="background: #55b154; border: none">Cadastrar</a>
                        <a href="pesquisa.php" class="btn btn-primary" style="background: #00BFFF; border: none; float: right;">Ver Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="qtd">
    <?php if($conta_linhas == 1 || $conta_linhas == 0){
    echo "$conta_linhas Tarefa Cadastada!"; }
    else{echo "$conta_linhas Tarefas Cadastradas!";}?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
    <footer class="footer cadastro">
<a href="https://instagram.com/douglaseduar"><h3>Douglas</h3></a>
</footer>
</html>