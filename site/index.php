<?php
include_once '../configuracao/configuracao.php';
// include_once './model/login.php';
// Login::automatcLogout();
//http://localhost/diogo/Acesso_inteligente_ETE/index.php?pagina=25

/**
 * Pegando informação da url
 */
if ($_GET && isset($_GET['pagina'])) {
    $paginaUrl = $_GET['pagina'];
} else {
    $paginaUrl = null;
}



if ($paginaUrl === 'acesso') {
    include_once './model/aluno.php';
    include_once "./controller/alunoController.php";

} elseif ($paginaUrl === 'historico') {
    if ($_GET && isset($_GET['idAluno'])) {
        $idAluno = $_GET['idAluno'];
    } else {
        $idAluno = null;
    }
    include_once './model/aluno.php';
    include_once './controller/historicoAlunoController.php';

}
// elseif ($paginaUrl === 'aluno') {
//     if ($_GET && isset($_GET['idAluno'])) {
//         $idAluno = $_GET['idAluno'];
//     } else {
//         $idAluno = null;
//     }
//     include_once './model/aluno.php';
//     include_once "./controller/alunoDetalheController.php";
    
// }
 elseif ($paginaUrl === 'login-secretaria') {
    include_once "./model/login.php";
    include_once "./controller/loginController.php";  

}  elseif ($paginaUrl === 'secretaria') {
    include_once './model/aluno.php';
    include_once "./controller/coordenacaoController.php";

}elseif ($paginaUrl === 'login-responsavel') {
    if ($_GET && isset($_GET['idAluno'])) { $idAluno = $_GET['idAluno'];} else { $idAluno = 0; }
    include_once "./controller/loginControllerResponsaveis.php";

}elseif ($paginaUrl === 'responsavel') {
    if ($_GET && isset($_GET['idAluno'])) { $idAluno = $_GET['idAluno'];} else { $idAluno = 0; }
    include_once './model/responsaveis.php';
    include_once './model/aluno.php';
    include_once "./controller/responsaveisController.php";
    
}elseif ($paginaUrl === 'lista-aluno') {
    if ($_GET && isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = null;
    }

    include_once './model/aluno.php';
    include_once './controller/listaAlunoController.php';
    

}
elseif ($paginaUrl === 'lista-aluno2') {
    if ($_GET && isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = null;
    }

    include_once './model/aluno.php';
    include_once './controller/listaTotal.php';
    

}elseif ($paginaUrl === 'biometria') {
    if ($_GET && isset($_GET['idAluno'])) {
        $idAluno = $_GET['idAluno'];
    } else {
        $idAluno = null;
    }
    include_once './model/aluno.php';
    include_once './model/biometria.php';
    include_once './controller/biometriaController.php';

}elseif ($paginaUrl === 'formulario-cadastro'){
    include_once './model/aluno.php';
    include_once './controller/formularioCadastroController.php';

}elseif ($paginaUrl === 'update'){
    include_once './model/aluno.php';
    include_once './controller/update.php';
}
elseif ($paginaUrl === 'lista-total'){
    include_once './model/aluno.php';
    include_once './controller/listaTotal.php';

}elseif ($paginaUrl === 'listar'){
    if ($_GET && isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = null;
    }
    include_once './model/aluno.php';
    include_once './controller/listaAlunoCadastroController.php';
}
else{
    include_once './view/header.php';
    include_once './view/paginaNaoLocalizada.php';
    include_once './view/footer.php';
}

?>