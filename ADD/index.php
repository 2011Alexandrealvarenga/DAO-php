<?php 
require 'config.php';
require 'dao/UsuarioDaoMySql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);
$lista = $usuarioDao->findAll();
?>
<a href="adicionar.php">adicionar</a>
<table border="1" width="50%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
    </tr>
    <?php foreach($lista as $usuario):?>
    <tr>
        <td><?php echo $usuario->getId();?></td>
        <td><?php echo $usuario->getNome();?></td>
        <td><?php echo $usuario->getEmail();?></td>
    </tr>
    <?php endforeach;?>
</table>
