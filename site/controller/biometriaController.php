<?php

@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/biometria.php';
@include_once '../model/aluno.php';
@include_once './model/login.php';
@include_once '../model/login.php';

$biometria = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['myP'])) ? $_POST['myP'] : false;
if (@!$idAluno) {
    $idAluno = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['idAluno'])) ? $_POST['idAluno'] : null;
}
$msgAlert = "";

if ($biometria && @$idAluno) {
    $alunoObj = new Aluno(null, null, null);
    $alunoRetorno = $alunoObj->buscarPorId($idAluno);


    if ($alunoRetorno[0]["biometria01"]) {

        $biometriaObj = Biometria::inserirBiometria02($idAluno, $biometria);


    } elseif ($alunoRetorno[0]["biometria02"]) {
        $biometriaObj = Biometria::inserirBiometria01($idAluno, $biometria);

    } else {
        $biometriaObj = Biometria::inserirBiometria01($idAluno, $biometria);
    }
}

$alunoObj = new Aluno(null, null, null);

$usuarioLogado = Login::verificarAutenticacao('secretaria');

if (@$paginaUrl && $usuarioLogado && @$idAluno) {
    $exibirFormulario = true;
    $alunoRetorno = $alunoObj->buscarPorId($idAluno);
    @include_once './view/header.php';
    @include_once './view/footer-biometria.php';
 } 
if(@$paginaUrl && !$usuarioLogado) {
    header('LOCATION:' . constant('URL_LOCAL_SITE') . "?pagina=login-secretaria");
}

if ($biometria) {
    $msgAlert = "sucesso";
    $exibirFormulario = true;
    $alunoRetorno = $alunoObj->buscarPorId($idAluno);
    @include_once '../view/header.php';
    @include_once '../view/footer-biometria.php';
} else {
    $msgAlert = "Biometria não cadastrada, tente novamente!";
    $exibirFormulario = true;
    $alunoRetorno = $alunoObj->buscarPorId($idAluno);
    @include_once '../view/header.php';
    @include_once '../view/footer-biometria.php';
}
?>