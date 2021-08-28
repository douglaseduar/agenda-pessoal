<?php
session_start();
include_once("conexao.php");

$tarefa = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$prazo = filter_input(INPUT_POST, 'prazo', FILTER_SANITIZE_STRING);


    $result_usuario = "INSERT INTO tarefas (tarefa, descricao, data) VALUES ('$tarefa', '$descricao', '$prazo')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green; font-family: sans-serif;'>tarefa foi Cadastrada!</p>";
    header("Location: ../cadastrar.php");
}
else {
    $_SESSION['msg'] = "<p style='color:red; font-family: sans-serif;'>tarefa não foi Cadastrada!</p>";
    header("Location: ../cadastrar.php");
}
?>