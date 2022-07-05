<?php 
require 'config.php';
require 'dao/UsuarioDaoMySql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($nome && $email){
    if($usuarioDao->findByEmail($email) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setEmail($email);

        $usuarioDao->add($novoUsuario);

        header("location: index.php");
        exit;

    }else{
        header("location: adicionar.php");
        exit;
    }
}else{
    header("location: adicionar.php");
    exit;
}

?>