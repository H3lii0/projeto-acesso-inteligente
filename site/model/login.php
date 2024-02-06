<?php
class Login {

public static function verificarAutenticacao($tipo){
    if(!$tipo) return false;
    if($tipo <> @$_SESSION["usuario"]["tipo"]) return false;
    if(!@$_SESSION["usuario"]["logado"]) return false;
    return true;
}

public static function validarSenhaSecretaria($email, $senha){
    $sql = "SELECT * FROM coordenacao WHERE email = :email and senha = :senha";
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $result = $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($result)?$result:false;
}

public static function validarSenhaResponsavel($idAluno, $senha){
    
    $sql = "SELECT * FROM responsavel WHERE idAluno = :idAluno and senha = :senha";
    $pdo = Database::conexao();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':idAluno', $idAluno);
    $stmt->bindValue(':senha', $senha);
    $result = $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($result)?$result:false;
}

public static function automatcLogout(){
    if($_SESSION['timestamp'] && $_SESSION['usuario'])
    if(time() - $_SESSION['timestamp'] > 225) { 
        echo"<script>alert('15 Minutes over!');</script>";
        unset($_SESSION['usuario']);
    } else {
        $_SESSION['timestamp'] = time();
    }
}

public static function consultaIdAluno($senha){ 
$sql = 'SELECT idAluno FROM `aluno` INNER JOIN `responsavel` ON aluno.id = responsavel.idAluno WHERE senha = :senha';
$pdo = Database::conexao();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':senha', $senha);
$result = $stmt->execute();
$result= $stmt->fetchAll(PDO::FETCH_COLUMN);
if($result)
{
    return $result[0];
}else{
    return false;
}       
}
}
?>