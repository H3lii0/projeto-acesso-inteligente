<!-- Declaração de variável pra alerta -->
<?php
$exibir_alerta = false
?>
<!-- Cabeçalho -->
<div class="container">
    <div class="row">
        <header>
            <img src="<?= constant("URL_LOCAL_IMG") ?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid">
        </header>
        <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
    </div>

    <!-- Condicinal caso as informações e login estajam incorretas -->
    <?php if ($exibir_alerta) : ?>
        <div class="alert alert-danger">
            <strong>Aviso!</strong> As informações estão errada!.
        </div>
    <?php endif ?>
    <section>
        <!-- Titulo de conteúdo da pagina -->
        <div class="row">
            <h1 class="text-center"><?=$titulo?></h1>
        </div>

        <!-- Formulário de acesso com condicional para validação -->
        <div class="row">
            <div class="col-sm-6">
                <?php if ($exibirFormulario) : ?>
                    <form action="<?=constant("URL_LOCAL_FORMS")?>loginController.php" method="post" class="was-validated">
                        <div class="mb-3 mt-3">
                            <label for="uname" class="form-label">Login:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Número da Matricula" name="email" required>
                            <div class="valid-feedback">Preenchido.</div>
                            <div class="invalid-feedback">Por favor, preencha este campo.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Insira a data" name="senha" required>
                            <div class="valid-feedback">Preenchido.</div>
                            <div class="invalid-feedback">Por favor, preencha este campo.</div>
                        </div>
                        <input type="hidden" name="tipo" value="secretaria">
                        <button type="submit" class="btn btn-primary mb-2 ">Entrar</button>
                    </form>
                <?php endif; //Exibir formularios
                ?>

                    <?php if (!$exibirFormulario) : ?>
                    <div class="mb-3 mt-3">
                        <a href="../view/tela-escola.php"></a>
                    <?php endif; //Exibir Sucesso?>
                    </div>

                    <!-- Imagem do com uma logo do Acesso Inteligente -->
                    <div class="offset-sm-1 col-sm-4 mb-2 ">
                        <img src="<?= constant("URL_LOCAL_IMG") ?>tela/logo_acesso.png" alt="Logo do Acesso Inteligente" class="pt-2 mt-3 flex-shrink-1 bd-highlight img-fluid ">
                    </div>
            </div>
    </section>

    <!-- Rodapé do site -->
    <div class="container">
        <div class="row">
            <footer>
                <p class="rounded float-right">
                    <img src="<?= constant("URL_LOCAL_IMG") ?>tela/rodape.png" alt="Logo da Secretaria de Educação e Esporte do Governo de Pernambuco." class="mb-2 pt-2 flex-shrink-1 bd-highlight img-fluid ">
                </p>
            </footer>
        </div>
    </div>
</div>