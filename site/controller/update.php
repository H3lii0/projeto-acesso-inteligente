<?php 
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/biometria.php';
@include_once '../model/aluno.php';
@include_once './model/login.php';
@include_once '../model/login.php';


if($_POST){
    var_dump($_POST);
}
var_dump('chegou aqui');

$idAluno = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['idAluno'])) ? $_GET['idAluno'] : null;
$id= ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['idAluno'])) ? $_POST['idAluno'] : null;
$matricula = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Matricula'])) ? $_POST['Matricula'] : null;
$nome = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Nome'])) ? $_POST['Nome'] : null;
$dataN = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['dataN'])) ? $_POST['dataN'] : null;
$email = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) ? $_POST['email'] : null;
$sexo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Sexo'])) ? $_POST['Sexo'] : null;
$serie = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Serie'])) ? $_POST['Serie'] : null;
$curso = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Curso'])) ? $_POST['Curso'] : null;
$telefone = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Telefone'])) ? $_POST['Telefone'] : null;

$alunoObj = new Aluno(null, null, null);
if(@$idAluno){
    var_dump('mostrou');
    $alunoRetorno = $alunoObj->buscarPorId($idAluno);
    $exibirFormulario = true;
    @include_once './view/header.php';
    @include_once './view/formularioUpdate.php';
    @include_once './view/footer.php';
}
var_dump('chegou aqui tambem');
if ($id && $matricula && $nome && $dataN && $email && $sexo && $serie && $curso && $telefone) {
    $cadastro = Aluno::editarAlunoPorId($id, $matricula, $nome, $dataN, $sexo, $serie, $curso, $email, $telefone);
    var_dump('atualizou');
    $msgAlert = 'Aluno atualizado com sucesso!';
    @include_once './view/header.php';
    @include_once './view/formularioUpdate.php';
    @include_once './view/footer.php';
    
}
var_dump('passou direto \0/');
?>