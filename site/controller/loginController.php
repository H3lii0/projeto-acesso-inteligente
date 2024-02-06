<?php
@include_once '../../configuracao/configuracao.php';
@include_once '../../configuracao/conexao.php';
@include_once '../model/seguranca.php';
@include_once '../model/login.php';
@include_once '../model/utilidades';

/**
 * Informações do formulário
 */
$email = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) ? $_POST['email'] : null;
$senha = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['senha'])) ? $_POST['senha'] : null;
$tipo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['tipo'])) ? $_POST['tipo'] : null;
$usuarioLogado = false;
$msgAlert = "";
/**
 * Informações estática da tela
 */
$titulo = "Login Acesso";


//Validação de login e senha
if($email && $senha){
    @$paginaUrl = false;
    if($tipo === 'secretaria'){
        $usuarioLogado = Login::validarSenhaSecretaria($email,$senha);
    }
}

if($usuarioLogado){
    $_SESSION["usuario"]["email"] = $email;
    $_SESSION["usuario"]["logado"] = $usuarioLogado;
    $_SESSION["usuario"]["tipo"] = $tipo;
    $_SESSION['timestamp'] = time();
}

/**
 * Tela vem do index via get
 */
if (@$paginaUrl) {
    if($_SESSION){
        // session_unset($_SESSION["usuario"]);
        session_destroy();
    }
    $exibirFormulario = true;
    @include_once './view/header.php';
    @include_once './view/loginSecretaria.php';
    @include_once './view/footer.php';
}

$retorno = Login::verificarAutenticacao($tipo);
if(!$retorno || @$paginaUrl) {

    $msgAlert = 'Login ou senha incorretos, tente novamente';
    $exibirFormulario = true;
    @include_once '../view/header.php';
    @include_once '../view/loginSecretaria.php';
    @include_once '../view/footer.php'; 
    @include_once './view/header.php';
    @include_once './view/loginSecretaria.php';
    @include_once './view/footer.php';
}
    
if($retorno && $tipo === 'secretaria') header('LOCATION:'.constant('URL_LOCAL_SITE')."?pagina=$tipo");