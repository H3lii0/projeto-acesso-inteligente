<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/aluno.php';

/**
 * Identificação da pagina acessada via index
 */

/**
 * Informações estática da tela
 */
$titulo = "Histórico De Presença";

//Criação de objetos
$alunoObj = new Aluno(null, null, null);

/**
 * Tela vem do index via get
 */

 if(@$paginaUrl){
   $exibirFormulario = true;
   $alunoRetorno = $alunoObj->listarPorFrequencia($idAluno);
   @include_once './view/header.php';
   @include_once './view/historicoAluno.php';
   @include_once './view/footer.php';
 }