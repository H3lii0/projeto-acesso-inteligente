<?php
include_once '../configuracao/conexao.php';
class Responsaveis {
    //atributos
    public $nome;
    public $email;
    public $telefone;
    public $senha;

    //Construtor
    public function __construct($nome, $email, $telefone, $senha){
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
    }

    function buscarPorId($idAluno){
        $pdo = Database::conexao();
        $sql = "SELECT * FROM responsavel WHERE idAluno = $idAluno";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function buscarPorMatricula($mat){
        $pdo = Database::conexao();
        $sql = "SELECT * FROM responsaveis WHERE matricula = $mat";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

}