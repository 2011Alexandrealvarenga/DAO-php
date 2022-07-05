<?php 
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');
if($id){
    $usuarioDao->delete($id);
}
header('location: index.php');
exit;