<!-- Declaração de variável pra alerta -->
<?php
$exibir_alerta = false
?>
    <!-- Cabeçalho -->
    <div class="container">
        <div class="row">
            <header>
                <img src="<?= constant("URL_LOCAL_IMG")?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid" >
            </header>
            <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
            <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
            <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
        </div>

         <!-- Condicinal caso as informações e login estajam incorretas -->
         <?php if($exibir_alerta):?>
            <div class="alert alert-danger">
                <strong>Aviso!</strong> As informações estão errada!.
            </div>
        <?php endif?>
        <section> 
            <!-- Titulo de conteúdo da pagina -->
            <div class="row">
                <h1 class="text-center"><?=$titulo?></h1>
            </div>

            <!-- Formulário de acesso com condicional para validação -->
                <div class="row">
                    <div class="col-sm-6">
                       <?php if ($exibirFormulario):?> 
                        <form action="/action_page.php" class="was-validated">
                        <div class="mb-3 mt-3">
                            <label for="uname" class="form-label">Matricula:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Número da Matricula" name="uname" required>
                            <div class="valid-feedback">Preenchido.</div>
                            <div class="invalid-feedback">Por favor, preencha este campo.</div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Data de Nascimento:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Insira a data" name="pswd" required>
                            <div class="valid-feedback">Preenchido.</div>
                            <div class="invalid-feedback">Por favor, preencha este campo.</div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                            <label class="form-check-label" for="myCheck">Concordar.</label>
                            <div class="valid-feedback">Marquado.</div>
                            <div class="invalid-feedback">Marque a caixa para continuar.</div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ">Entrar</button>
                        </form>
                        <?php endif?>
                    </div>

                    <!-- Imagem do com uma logo do Acesso Inteligente -->
                    <div class="offset-sm-1 col-sm-4 mb-2 ">
                        <img src="<?= constant("URL_LOCAL_IMG")?>tela/logo_acesso.png" alt="Logo do Acesso Inteligente" alt="Logo acesso inteligente"class="pt-2 mt-3 flex-shrink-1 bd-highlight img-fluid ">
                    </div>
                </div>
        </section>

        <!-- Rodapé do site -->
        <div class="container">
            <div class="row">
                <footer>
                    <p class="rounded float-right">
                        <img src="<?= constant("URL_LOCAL_IMG")?>tela/rodape.png" alt="Secretaria de Educação e Esportes de Pernambuco" alt="Logo da Secretaria de Educação e Esporte do Governo de Pernambuco." class="mb-2 pt-2 flex-shrink-1 bd-highlight img-fluid ">
                    </p>
                </footer>
            </div>
        </div>
    </div>