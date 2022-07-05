<?php 
include_once('models/Usuario.php');

class UsuarioDaoMySql implements UsuarioDao{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * from usuario");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            
            foreach($data as $item){
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);

                $array [] = $u;
            }
        }
        return $array;
    }
    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);

            return $u;
        }else{
            return false;
        }
    }
    public function update(Usuario $u){
        $sql = $this->pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id=:id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }
}