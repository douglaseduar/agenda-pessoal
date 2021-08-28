<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$tarefa = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$prazo = filter_input(INPUT_POST, 'prazo', FILTER_SANITIZE_STRING);


    $result_usuario = "UPDATE tarefas SET tarefa='$tarefa', descricao='$descricao', data='$prazo' WHERE cod='$id' ";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)) {
    header("Location: ../pesquisa.php");
}
else {
    $_SESSION['msg'] = "<p style='color:red; font-family: sans-serif;'> $tarefa não foi editado!</p>";
    header("Location: ../editar.php?id=$id");
}
?>