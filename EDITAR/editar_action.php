<?php 
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');

if($id && $nome && $email){
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("location: index.php");
    exit;
}else{
    header("location: editar.php?id=".$id);
    exit;
}