<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/aluno.php';
@include_once './model/aluno.php';
@include_once './model/login.php';
@include_once '../model/login.php';
@include_once '../controller/loginControllerResponsaveis.php';

// $idAluno = ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['idAluno'])) ? $_GET['idAluno'] : null;



/**
 * Informações estática da tela
 */
$titulo = "Responsaveis - Histórico do aluno";

//Criação de objetos
$alunoObj = new Aluno(null, null, null);


$usuarioLogado = Login::verificarAutenticacao('responsavel');
$idAluno = $_GET["idAluno"];
if(@$paginaUrl && $usuarioLogado){
    $exibirFormulario = true;
    $alunoRetorno = $alunoObj->listarPorFrequencia($idAluno);
    @include_once './view/header.php';
    @include_once './view/painelAluno.php';
    @include_once './view/footer.php'; 
}else{
    header('LOCATION:'.constant('URL_LOCAL_SITE')."?pagina=login-responsavel");
}