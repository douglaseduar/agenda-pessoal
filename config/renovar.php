<?php 

include_once("conexao.php");

            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $result_usuario = "SELECT * FROM tarefas WHERE cod = '$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            $data = $row_usuario['data'];
            
            $convertdata = date("Y-m-d H:m:s", strtotime("$data +1 month"));

            $renova = "UPDATE tarefas SET data='$convertdata' WHERE cod='$id' ";
            $renovador = mysqli_query($conn, $renova);

            header("Location: ../pesquisa.php")

?>