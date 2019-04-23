<?php
include('conexao.php');
$username = $_POST['login'];
$password = $_POST['senha'];

$query = "SELECT * FROM clientes WHERE username = '$username' and password = '$password'";
$result = mysqli_fetch_assoc((new Conexao())->query($query));

if($result['username'] == $username)
    header('Location: ../index.php?username='.$username);
else {
    header('Location: ../login.php?erro=1');
}