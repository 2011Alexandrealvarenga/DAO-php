<?php 
require 'config.php';
require 'dao/usuariodaomysql.php';

$usuarioDao = new UsuarioDaoMySql($pdo);
$lista = $usuarioDao->findAll();
?>
<table border="1" width="70%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>Editar</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
    <tr>
        <td><?php echo $usuario->getId();?></td>
        <td><?php echo $usuario->getNome();?></td>
        <td><?php echo $usuario->getEmail();?></td>
        <td>
            <a href="editar.php?id=<?php echo $usuario->getId();?>">Editar</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>