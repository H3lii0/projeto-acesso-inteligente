<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/aluno.php';
@include_once './model/login.php';
@include_once '../model/login.php';

/**
 * Identificação da pagina acessada via index
 */
$idAluno = true;
$limit = 20;
$msgAlert = "";
$exibir_paginacao = true;

if (@!$page) {
  $page = 1;
}

/**
 * Informações estática da tela
 */
$titulo = "Lista De Alunos";



//Criação de objetos
$alunoObj = new Aluno(null, null, null);

$usuarioLogado = Login::verificarAutenticacao('secretaria');

/**
 * Tela vem do index via get
 */

if (@$paginaUrl && $usuarioLogado) {
  $exibirFormulario = true;
  $alunoRetorno = $alunoObj->paginacao($idAluno);
  $listaAlunos = $alunoObj->ListaDeAluno();
  @include_once './view/header.php';
  @include_once './view/listaTotal.php';
  @include_once './view/footer.php';
}

if(@$paginaUrl && !$usuarioLogado) {
 header('LOCATION:' . constant('URL_LOCAL_SITE') . "?pagina=login-secretaria");
}




if (isset($_POST['termo'])) {
  $termo = $_POST['termo'];
  $exibir_paginacao = false;
  $resultado_pesquisa = $alunoObj->buscarPorTermo($termo);
  if (!empty($resultado_pesquisa)) {
    $listaAlunos = $resultado_pesquisa;
    $alunoRetorno = $resultado_pesquisa;
    $exibirFormulario = true;
    @include_once '../view/header.php';
    @include_once '../view/listaTotal.php';
   

  } elseif (empty($resultado_pesquisa)) {
    $alunoRetorno = $alunoObj->paginacao($idAluno);
    $listaAlunos = $alunoObj->ListaDeAluno();
    $exibirFormulario = true;
    $exibir_paginacao = true;
    $msgAlert = 'Aluno não encontrado!';
    @include_once '../view/header.php';
    @include_once '../view/listaTotal.php';
  }
}
