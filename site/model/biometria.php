<?php
class Biometria {
    public static function inserirBiometria01 ($idAluno, $biometria) {

        
        $sql = "UPDATE aluno
        SET biometria01 = :biometria01
        WHERE id = :idAluno";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':biometria01', $biometria);      
        $stmt->bindValue(':idAluno', $idAluno);      
        $result = $stmt->execute();
        if($result);   
    }
    public static function inserirBiometria02 ($idAluno, $biometria) { 
        
        $sql = "UPDATE aluno
        SET biometria02 = :biometria02
        WHERE id = :idAluno";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':biometria02', $biometria);      
        $stmt->bindValue(':idAluno', $idAluno);      
        $result = $stmt->execute();
        if($result);   
    }
    public function listarBiometria(){
        $sql = "SELECT * FROM aluno ";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    public static function buscarBiometria($idAluno){
        $sql = "SELECT aluno.biometria01,aluno.biometria02,aluno.id FROM aluno WHERE id = $idAluno";
        $pdo = Database::conexao();
        $stmt = $pdo->prepare($sql);       
        $list = $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    // public static function compararBiometrias($novaBiometria, $biometria01, $biometria02){
    //     $sql = "SELECT biometria01, biometria02
    //     FROM aluno
    //     WHERE id = :idAluno
    //     GROUP BY biometria01 = :biometria01
    //     ORDER BY biometria02 = :biometria02";
    //     $pdo = Database::conexao();
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindValue(':biometria01', $biometria01);      
    //     $stmt->bindValue(':biometria02', $biometria02);
    //     $stmt->execute(array(':biometria01' => $biometria01, ':biometria02' => $biometria02));
    //     //$stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     var_dump($result);
    //     if ($result){ 
    //         if($novaBiometria === $biometria01 && $biometria02){
    //             return 'ok';
    //         }
    //      }
    // }
        public static function teste($biometria) {
            var_dump($biometria);die;
    }
}
?>