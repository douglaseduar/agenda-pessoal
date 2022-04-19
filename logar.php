<?php
$login = $_POST['login'];
$senha = $_POST['senha'];

$result_usuario = "SELECT * FROM login WHERE login = '$login'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

if(!$login = $_POST['login']){
    header('Location: login.php');
}
if($login = $_POST['login'] && $senha = $_POST['senha'] != $row_usuario['senha']){
    header('Location: login.php');
}
?>