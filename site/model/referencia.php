<?php

class Usuario {
    //atributos
    public $nome;
    public $email;
    public $senha;

    //Construtor
    public function __construct($nome, $email, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    function listarUsuario(){
        $pdo = Database::conexao();
        $sql = "SELECT * FROM usuario";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function apagarUsuario($id){
        $pdo = Database::conexao();
        $sql = "DELETE FROM `usuario` WHERE `usuario`.`id` = $id";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute();
        if($result){return true;}else{return false;}
    }

    function inserirUsuario($email,$nome,$login,$senha){
        $sql = "INSERT INTO usuario(email,nome,login,senha)
        VALUES(:email,:nome,:login,:senha)";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $result = $stmt->execute();
        if($result){
            return true;
        }
        else{return false;}
    }

    function buscarUsuarioPorId($id){
        $pdo = Database::conexao();
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function editarUsuarioPorId($id, $nome, $login, $email, $senha){
        $pdo = Database::conexao();
        $sql = "UPDATE usuario SET
        nome = :nome,
        login = :login,
        email = :email,
        senha = :senha
        WHERE usuario.id = $id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        return $result = $stmt->execute();
    }

}