<?php
require_once 'conexao.php';

$username = $_POST['login'];
$password = $_POST['senha'];

$query = "SELECT * FROM clientes WHERE username = '$username' and password = '$password'";
$result = mysqli_fetch_assoc((new Conexao())->query($query));




$content = http_build_query(array(
    'id' => $result['id'],
    'nome' => $result['nome'],
    'cpf' => $result['cpf'],
    'email' => $result['email'],
    'username' => $result['username']
   // 'logado' => $result['logado']
));
  
$context = stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'content' => $content,
    )
));
  


if($result['username'] == $username) {
    echo "<script>alert('logado!);</script>";
    $result = file_get_contents('../index.php', null, $context);
    header('Location: ../index.php');
}
else {
    header('Location: ../login.php?erro=1');
}