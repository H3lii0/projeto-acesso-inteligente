<!-- Cabeçalho -->
<div class="container mt-3">
    <div class="row">
        <header>
            <img src="<?= constant("URL_LOCAL_IMG")?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid">
        </header>
        <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
    </div>
    <section>
        <!-- Titulo do conteúdo da pagina -->
        <div class="row">
            <div class="col"><h1 class="text-center"><?=$titulo?$titulo:null?></h1></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php if(@$alerta_sucesso):?>
                    <div class="alert alert-success">
                        <strong>SUCESSO</strong> <?=@$alerta_sucesso?>.
                    </div>

                <!-- Formulário de acesso com condicional para validação -->
                <?php endif;?>
                    <?php if($exibirFormulario):?>
                    <form action="<?=constant("URL_LOCAL_FORMS")?>alunoController.php" method="post" class="was-validated">
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Número de identificação:</label>
                        <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Digitar identificação + PRESSIONE ENTER" name="uname" required>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback"><?=$valorAtual?></div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mb-2" class="btn btn-outline-primary">Acessar</button> -->
                </form>
                <?php endif;//Exibir formularios?>

                <!-- Exibição das informações caso a condicional do campo do formulário estejam corretas -->
                <?php if(!$exibirFormulario):?>
                    <div class="mb-3 mt-3">
                        <h4>Seja bem vindo(a) <?=$alunoRetorno[0]['Nome']?></h4>
                        <span>Matricula: <?=$alunoRetorno[0]['Matricula']?></span><br/>
                        <span>Data nascimento: <?=$alunoRetorno[0]['Data_Nasc']?></span><br/>
                        <span>Curso: <?=$alunoRetorno[0]['Curso']?></span>
                    </div>
                <?php endif;//Exibir Sucesso?>
            </div>

            <!-- Imagem do com uma logo do Acesso Inteligente -->
            <div class="col-sm-6 mb-2 ">
                <img src="<?= constant("URL_LOCAL_IMG")?>tela/logo_acesso.png" alt="Logo acesso inteligente" class="pt-2 mt-1 flex-shrink-1 bd-highlight img-fluid ">
            </div>
        </div>
    </section>

    <!-- Rodapé do site -->
    <div class="row">
        <footer>
            <p class="rounded float-right p-0">
                <img src="<?= constant("URL_LOCAL_IMG")?>tela/rodape.png" alt="Logo da Secretaria de Educação e Esporte do Governo de Pernambuco." class="mb-1 ml-1 pt-2 flex-shrink-1 bd-highlight img-fluid ">
            </p>
        </footer>
    </div>
</div>