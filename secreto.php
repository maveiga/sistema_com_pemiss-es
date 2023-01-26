
<?php
session_start();

    require 'classes/usuarios.class.php';

    require 'config.php';

    if(!isset($_SESSION['Logado'])){
        header("Location: login.php");
        exit;
    }

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['Logado']);

    if($usuarios->temPermissao("SECRET") == false){
        header("Location: index.php");
    exit;

    }else{

    }
   
   ?>
    
<h1>pagina secreta</h1>