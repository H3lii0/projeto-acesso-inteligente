<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/aluno.php';
@include_once './model/login.php';
@include_once '../model/login.php';
@include_once '../../model/login.php';

$matricula = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Matricula'])) ? $_POST['Matricula'] : null;
$nome = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Nome'])) ? $_POST['Nome'] : null;
$dataN = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['dataN'])) ? $_POST['dataN'] : null;
$email = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) ? $_POST['email'] : null;
$sexo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Sexo'])) ? $_POST['Sexo'] : null;
$serie = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Serie'])) ? $_POST['Serie'] : null;
$curso = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Curso'])) ? $_POST['Curso'] : null;
$telefone = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Telefone'])) ? $_POST['Telefone'] : null;


$msgAlert = "";

$alunoObj = new aluno(null, null, null);

$usuarioLogado = Login::verificarAutenticacao('secretaria');

if (@$paginaUrl && $usuarioLogado) {
    $listaAlunos = $alunoObj->ListaDeAluno();
    @include_once './view/header.php';
    @include_once './view/formularioCadastroAluno.php';
    @include_once './view/footer.php';
}

if(@$paginaUrl && !$usuarioLogado) {
   header('LOCATION:' . constant('URL_LOCAL_SITE') . "?pagina=login-secretaria");
}

if ($matricula && $nome && $dataN && $email && $sexo && $serie && $curso && $telefone) {
    $cadastro = Aluno::cadastrarAluno($matricula, $nome, $dataN, $sexo, $serie, $curso, $email, $telefone);
    $msgAlert = 'Aluno cadastrado com sucesso!';
    @include_once '../view/header.php';
    @include_once '../view/formularioCadastroAluno.php';
    @include_once '../view/footer.php';
    
} else {
    $listaAlunos = $alunoObj->ListaDeAluno();
    $msgAlert = 'Preencha todo o Cadastro!';
    @include_once '../view/header.php';
    @include_once '../view/formularioCadastroAluno.php';
    @include_once '../view/footer.php';
}


// if (@$cadastro) {
//     $listaAlunos = $alunoObj->ListaDeAluno();
//     header('Location:' . constant("URL_LOCAL_SITE") . "?pagina=cadastro");
// } else {
//     $listaAlunos = $alunoObj->ListaDeAluno();
//     $msgAlert = 'Não foi enviado!';
//     @include_once '../view/header.php';
//     @include_once '../view/formularioCadastroAluno.php';
//     @include_once '../view/footer.php';
// }

// if(@$id){
//     $listaAlunos = $alunoObj->ListaDeAluno();
//     @include_once '../view/header.php';
//     @include_once '../view/formularioUpadate.php';
//     @include_once '../view/footer.php';
// }



if (@$idAluno && is_numeric($idAluno)) {
    $retorno = Aluno::deletaAluno($idAluno);
    if (@$retorno) {
        $listaAlunos = $alunoObj->ListaDeAluno();
        $msgAlert = 'Aluno apagado com sucesso!';
        @include_once '../view/header.php';
        @include_once '../view/formularioCadastroAluno.php';
        @include_once '../view/footer.php';
    }else{
        $listaAlunos = $alunoObj->ListaDeAluno();
        $msgAlert = 'Algo deu errado, aluno não foi apagado!';
        @include_once '../view/header.php';
        @include_once '../view/formularioCadastroAluno.php';
        @include_once '../view/footer.php';
    }
}


?>