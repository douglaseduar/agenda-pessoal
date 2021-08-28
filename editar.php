<?php
session_start();
include_once("config/conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM tarefas WHERE cod = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$convertdata = strftime("%Y-%m-%dT%H:%M", strtotime($row_usuario['data']));
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <title>Editar Veiculo</title>
        <link rel="shortcut icon" href="assets/img/66276.png" type="image/x-icon">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    </head>
    <script>
</script>
    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand edit" href="#">Editar Tarefa</a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
            <?php
    if(isset ($_SESSION['msg'])){
        echo $_SESSION['msg'];
        echo "<br>";
        unset($_SESSION['msg']);
    }
    ?>
                        <form action="config/processoedit.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row_usuario['cod'] ?>">
                        <label for="tarefa">O que deve ser feito?</label>
                        <input type="text" class="form-control" name="tarefa" id="tarefa" required="" value="<?php echo $row_usuario['tarefa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" required="" value="<?php echo $row_usuario['descricao'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="prazo">Prazo</label>
                        <input type="datetime-local" class="form-control" name="prazo" id="prazo" required="" value="<?php echo $convertdata;?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="pesquisa.php" class="btn btn-secondary">Voltar</a>
                </form>
                    
                </form>
            </div>
</div>
<footer class="footer cadastro">
<a href="https://instagram.com/douglaseduar"><h3>Douglas</h3></a>
</footer>
</body>
</html>