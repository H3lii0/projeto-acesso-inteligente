<?php
@include_once '../model/aluno.php';
@include_once '../../configuracao/conexao.php';
@include_once '../../configuracao/configuracao.php';


/**
 * Informações estática da tela
 */
$titulo = "Painel Do Aluno";

//Criação de objetos
$alunoObj = new Aluno(null, null, null);

if (@$idAluno) {
    $exibirFormulario = true;
    $alunoRetorno = $alunoObj->listarPorFrequencia($idAluno);
    @include_once './view/header.php';
    @include_once './view/painelAluno.php';
    @include_once './view/footer.php';
}