<?php
include_once '../configuracao/conexao.php';
class Aluno
{
    //atributos
    public $nome;
    public $matricula;
    public $dataNascimento;

    //Construtor
    public function __construct($nome, $matricula, $dataNascimento)
    {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->dataNascimento = $dataNascimento;
    }

    function buscarPorId($id)
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM aluno WHERE id = $id";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function buscarPorBiometria($bio)
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM aluno WHERE biometria01 = $bio";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function buscarPorMatricula($mat)
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM aluno WHERE matricula = $mat";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    /**
     * Listar alunos pela data
     * OBS: Usar formato da data americana
     * EX: 2023-09-19
     */
    function listarPordata($data)
    {
        $pdo = Database::conexao();
        $sql = "SELECT frequencia.*,aluno.*
        FROM frequencia
        INNER JOIN aluno ON frequencia.idAluno=aluno.id
        WHERE frequencia.acesso_data = '$data';";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list ? $list : null;
    }

    function diaDaSemanaExtenso($dia)
    {
        if (!$dia) {
            $dia = date("l");
        }
        switch ($dia) {
            case 'Monday':
                $dia = 'Segunda-feira';
                break;
            case 'Tuesday':
                $dia = 'Terça-feira';
                break;
            case 'Wednesday':
                $dia = 'Quarta-feira';
                break;
            case 'Thursday':
                $dia = 'Quinta-feira';
                break;
            case 'Friday':
                $dia = 'Sexta-feira';
                break;
            case 'Saturday':
                $dia = 'Sabado';
                break;
            case 'Sunday':
                $dia = 'Domingo';
                break;
        }
        return $dia;
    }

    public function cadastrarRegistroEntrada($idAluno)
    {
        $sql = "INSERT INTO frequencia(idAluno,acesso_registro,acesso_data,acesso_hora,dia_semana) 
        VALUES(:idAluno,:acesso_registro,:acesso_data,:acesso_hora,:dia_semana)";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idAluno', $idAluno);
        $stmt->bindValue(':acesso_registro', ' `NOW()` ');
        $stmt->bindValue(':acesso_data', date("Y.m.d"));
        $stmt->bindValue(':acesso_hora', date("h:i:s"));
        $stmt->bindValue(':dia_semana', $this->diaDaSemanaExtenso(date("l")));
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
            //$stmt->errorInfo();
        }

    }

    function verificacaoDeFrequencia($idAluno)
    {
        $pdo = Database::conexao();
        $dataHoje = date('Y-m-d');
        $sql = "SELECT * FROM frequencia WHERE idAluno = :idAluno and acesso_data = :dataHoje";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idAluno', $idAluno);
        $stmt->bindValue(':dataHoje', $dataHoje);
        $stmt->execute();
        $quantidadeAcesso = $stmt->fetchColumn();
        return $quantidadeAcesso > 0;

    }
    function listarPorFrequencia($idAluno)
    {
        $pdo = Database::conexao();
        $sql = "SELECT frequencia.*, aluno.* 
        FROM frequencia
        INNER JOIN aluno ON frequencia.idAluno=aluno.id
        WHERE aluno.id = :idAluno ORDER BY acesso_data DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':idAluno', $idAluno);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list ? $list : null;
    }

    function listarAlunos($id)
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM aluno WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    function ListaDeAluno()
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM aluno";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function paginacao($id)
    {
        $pdo = Database::conexao();
        global $page;
        global $limit;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM aluno LIMIT $limit OFFSET $offset";
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    public static function inserirImagem($target_file, $idAluno)
    {
        $pdo = Database::conexao();
        $sql = "UPDATE aluno SET imagem = :imagem WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':imagem', $target_file);
        $stmt->bindValue(':id', $idAluno);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function buscarPorTermo($termo)
    {
        $pdo = Database::conexao();
        $sql = "SELECT * FROM aluno WHERE Nome LIKE :termo";
        $stmt = $pdo->prepare($sql);
        $termo = $termo . '%';  // Adicione '%' antes e depois do termo para fazer uma pesquisa com correspondência parcial
        $stmt->bindParam(':termo', $termo, PDO::PARAM_STR);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    public static function cadastrarAluno($matricula, $nome, $dataN, $sexo, $serie, $curso, $email, $telefone)
    {
        $sql = "INSERT INTO `aluno` (`Matricula`,`Nome`,`Data_Nasc`,`Sexo`,`Serie`,`Curso`,`email`,`Telefone`)
        VALUES(:matricula,:nome,:dataN,:sexo,:serie,:curso,:email,:telefone)";

        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dataN', $dataN);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':serie', $serie);
        $stmt->bindParam(':curso', $curso);
        $stmt->bindParam(':telefone', $telefone);
        $result = $stmt->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    static public function deletaAluno($idAluno){
        $pdo = Database::conexao();
        $sql = "DELETE FROM `aluno` WHERE id = :idAluno";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    static public function editarAlunoPorId($idAluno, $matricula, $nome, $dataN, $sexo, $serie, $curso, $email, $telefone){
        $pdo = Database::conexao();
        $sql = "UPDATE aluno SET matricula = :matricula, nome = :nome, email = :email, dataN = :dataN, sexo = :sexo, serie = :serie,
        curso = :curso, telefone = :telefone WHERE aluno.id = $idAluno";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':matricula', $matricula);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':dataN', $dataN);
        $stmt->bindValue(':sexo', $sexo);
        $stmt->bindValue(':serie', $serie);
        $stmt->bindValue(':curso', $curso);
        $stmt->bindValue(':telefone', $telefone);
        return $result = $stmt->execute();
    }
}
