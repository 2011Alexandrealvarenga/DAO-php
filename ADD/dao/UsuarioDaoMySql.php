<?php 
include_once('models/Usuario.php');

class UsuarioDaoMySql implements UsuarioDAO{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }
    public function add(Usuario $u){
        $sql = $this->pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();
    }
    public function findAll(){
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM usuario");
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
    public function findByEmail($email){
        $sql = $this->pdo->prepare('SELECT * FROM usuario WHERE email = :email');
        $sql->bindValue('email', $email);
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

}