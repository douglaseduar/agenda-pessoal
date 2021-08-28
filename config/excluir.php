<?php 

include_once("conexao.php");

            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            $deletar = "DELETE FROM tarefas WHERE cod='$id' ";
            $deletador = mysqli_query($conn, $deletar);

            header("Location: ../pesquisa.php")

?>