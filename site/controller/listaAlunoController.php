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
  @include_once './view/listaDeAluno.php';
  @include_once './view/footer.php';
}

if(@$paginaUrl && !$usuarioLogado) {
 header('LOCATION:' . constant('URL_LOCAL_SITE') . "?pagina=login-secretaria");
}


$target_dir = "upload/";
@$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $id = $alunoObj->buscarPorId($idAluno);
  $check = getimagesize($_FILES["imagem"]["tmp_name"]);
  if (move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
    $idAluno = isset($_POST['aluno_id']) ? $_POST['aluno_id'] : null;
    if ($idAluno !== null) {
      $imagens = Aluno::inserirImagem($target_file, $idAluno);

      if ($check !== false) {
        $exibirFormulario = true;
        $alunoRetorno = $alunoObj->ListaDeAluno($idAluno);
        @$exibirFormulario = true;
        $msgAlert = ' Imagem inserida com sucesso ';
        @include_once '../view/header.php';
        @include_once '../view/listaDeAluno.php';
        @include_once '../view/footer.php';
        $uploadOk = 1;
      } else {
        $exibirFormulario = true;
        $alunoRetorno = $alunoObj->ListaDeAluno($idAluno);
        @$exibirFormulario = true;
        $msgAlert = ' imagem não foi inserida ';
        @include_once '../view/header.php';
        @include_once '../view/listaDeAluno.php';
        @include_once '../view/footer.php';
        $uploadOk = 0;
      }
    } else {
      echo 'Id não encontrado';
    }
  } else {
    echo 'imagem não foi enviada';
  }
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
    @include_once '../view/listaDeAluno.php';
   

  } elseif (empty($resultado_pesquisa)) {
    $alunoRetorno = $alunoObj->paginacao($idAluno);
    $listaAlunos = $alunoObj->ListaDeAluno();
    $exibirFormulario = true;
    $exibir_paginacao = true;
    $msgAlert = 'Aluno não encontrado!';
    @include_once '../view/header.php';
    @include_once '../view/listaDeAluno.php';
  }
}
// if($_POST){
//   var_dump($_POST);
//   $msgAlert ="sucesso";
//   $exibirFormulario = true;
//   $alunoRetorno = $alunoObj->buscarPorId($idAluno);
//   @include_once '../view/header.php';
//   @include_once '../view/footer-biometria.php'; 
// }else{
//   // $msgAlert ="";
//   $exibirFormulario = true;
//   $alunoRetorno = $alunoObj->buscarPorId($idAluno);
//   @include_once '../view/header.php';
//   @include_once '../view/footer-biometria.php'; 
// }