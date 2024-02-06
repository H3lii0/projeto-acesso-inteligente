<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/aluno.php';
$msgAlert = "";
$alerta_sucesso = "";
$valorAtual = 'Por favor, preencha este campo.';
$verificarBiometria = false;


/**
 * Informações do formulário
 * ATENÇÃO NO MOMENTO REPRESENTA ID NO BANCO DO ALUNO
 */
$matricula = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['matricula'])) ? $_POST['matricula'] : null;

/**
 * Informações estática da tela
 */
$titulo = "Acesso aluno ETE";

//Criação de objetos
$alunoObj = new Aluno(null, null, null);

/**
 * Tela vem do index via get
 */
if (@$paginaUrl) {
    $exibirFormulario = true;
    @include_once './view/header.php';
    @include_once './view/controleAcesso.php';
    @include_once './view/footer_acesso.php';
}

if ($matricula) {
    // ::ATENÇÃO:: NO MOMENTO ESTÁ BUSCANDO POR ID DO ALUNO
    // $alunoRetorno = $alunoObj->buscarPorMatricula($matricula);
    $alunoRetorno = $alunoObj->buscarPorId($matricula);

    if ($alunoRetorno) {
        $acessoHoje = $alunoObj->verificacaoDeFrequencia($alunoRetorno[0]['id']);

        if ($acessoHoje) {

            @$exibirFormulario = true;
            $msgAlert = ' você já fez o acesso hoje';
            include_once '../view/header.php';
            include_once '../view/controleAcesso.php';
             include_once '../view/footer_acesso.php';
        } else {
            $digital = $alunoRetorno[0]['biometria01'];
        }

        @$exibirFormulario = false;
        $alerta_sucesso = "Aluno(a) Localizado com Sucesso.";
        @include_once '../../configuracao/configuracao.php';
        include_once '../model/aluno.php';
        include_once "../controller/alunoController.php";
        include_once '../view/header.php';
        include_once '../controller/acessoAjax.php';
        // if(@$exibirFormulario){include_once '../view/controleAcesso.php';}else{include_once '../view/controleAcesso_sucesso.php';}
        include_once '../view/footer_acesso.php';

    } else {
        $msgAlert = 'Número de Identificação inexistente';
        $valorAtual = 'Matricula inexistente';
        $exibirFormulario = true;
        include_once '../view/header.php';
        include_once '../view/controleAcesso.php';
        include_once '../view/footer_acesso.php';

    }
}
