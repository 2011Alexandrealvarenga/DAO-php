<?php 

class Usuario{
    private $id;
    private $nome;
    private $email;

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;        
    }
    public function getEmail(){
        return $this->email;
    }
    // SET
    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    } 
}

interface UsuarioDao{
    public function findAll();
}