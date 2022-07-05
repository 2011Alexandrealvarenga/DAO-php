<?php 
class Usuario{
    private $id;
    private $nome;
    private $email;
    
    // GET
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
interface UsuarioDAO{
    public function findAll();
    public function findByEmail($email);
}