<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuarios = new Usuarios($pdo);
    if($usuarios->fazerLogin($email, $senha)){
        header("Location: index.php");


    }else{
        echo 'usuarios ou senha errados';
    }

    

}
?>

<h1>Login</h1>
<form method="POST">
    E-mail:<br/>
    <input type="email" name="email" /><br/></br>

    senha:<br/>
    <input type="password" name="senha"/>
    <input type="submit" value="Entrar"/>

</form>