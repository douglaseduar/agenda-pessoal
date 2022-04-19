<?php
include_once("config/conexao.php");
$texto = $_POST["anot"];

$result_usuario = "UPDATE anotacoes SET anotacao='$texto', modificado=NOW() WHERE id = 1 ";
$resultado_usuario = mysqli_query($conn, $result_usuario);

header("Location: pesquisa.php");

?>