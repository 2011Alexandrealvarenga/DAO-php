<?php 
require 'config.php';
require 'DAO/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);

$usuario = false;
$id = filter_input(INPUT_GET, 'id');
if($id){
    $usuario = $usuarioDao->findById($id);
}
if($usuario === false){
    header("location: index.php");
}
?>
<h2>Editar Usuario</h2>
<form action="editar_action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $usuario->getId();?>">
    <label for="">
        nome: <br>
        <input type="text" name="nome" value="<?php echo $usuario->getNome();?>">
    </label>
    <label for="">
        nome: <br>
        <input type="text" name="email" value="<?php echo $usuario->getEmail();?>">
    </label>
    <input type="submit" value="Salvar">
</form>