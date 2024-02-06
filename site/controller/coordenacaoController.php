<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/aluno.php';
@include_once './model/login.php';
@include_once '../model/login.php';


/**
 * Informações estática da tela
 */
$titulo = "Monitor de acessos";

//Criação de objetos
$alunosObj = new Aluno(null, null, null);
$hoje = date('Y-m-d');
$listaAlunos = $alunosObj->listarPordata($hoje); 
if($listaAlunos){
    $totalAlunos = sizeof($listaAlunos);
}else{
    $totalAlunos = 0;
}

$usuarioLogado = Login::verificarAutenticacao('secretaria'); 

/**
 * Tela vem do index via get
 */

if(@$paginaUrl && $usuarioLogado){
    @include_once './view/header_coordenacao.php';
    @include_once './view/coordenacao.php';
    @include_once './view/footer.php'; 
}else{
    header('LOCATION:'.constant('URL_LOCAL_SITE')."?pagina=login-secretaria");
}






