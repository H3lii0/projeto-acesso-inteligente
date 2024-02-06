<?php if (@$msgAlert) : ?>
    <!-- <script>
        setTimeout(alertFunc, 2000);

        function alertFunc() {
            alert('ATENÇÂO: <?= @$msgAlert ?>');
        }
    </script> -->
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<?php
@include_once './../model/biometria.php';
?>
<div class="container">
    <div class="row">
        <header>
            <img src="<?= constant("URL_LOCAL_IMG") ?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid">
        </header>
        <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
    </div>
    <a href="<?= constant("URL_LOCAL_SITE") ?>?pagina=lista-aluno" class="btn btn-outline-primary mt-4">Voltar</a>

    <div class="row">
        <div class="offset-3 col-sm-6 flex-shrink-1 ">
            <table class="table responsive-sm table table-borderless">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Ano</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $alunoRetorno[0]["Nome"] ?></td>
                        <td><?= $alunoRetorno[0]["Curso"] ?></td>
                        <td><?= $alunoRetorno[0]["Serie"] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="offset-2 col-sm-4">
            <div class="cartao-g">
                <div class="cartao-p" style="--clr:#0C69F1;">
                    <div class="imgBx">
                        <img src="<?= constant("URL_LOCAL_IMG") ?>tela/biometria.png" alt="Passo a passo do cadastro-biometria">
                    </div>
                    <div class="content">
                        <h2>Biometria</h2>
                        <span>Cadastre um dedo de cada vez, siga a sequencia destacada na imagem. <br> Após inserir o dedo no leitor, clique no botão <strong>Enviar</strong> para completar o cadastro.</span>
                        <br>
                        <button class="botao" onclick="minhaFuncao()" style="float: none;">Inserir biometria</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-2 d-flex justify-content-right">
            <img src="<?= constant("URL_LOCAL_IMG") ?>tela/logo-biometria.png" alt="Logo do Acesso Inteligente" class="pt-2 mt-3  ">
        </div>
    </div>
    <form action="<?= constant("URL_LOCAL_FORMS") ?>biometriaController.php" method="POST" class="was-validated">
        <br>
        <div class="mb-3 ml-3 mt-3">
            <div class="mb-3 mt-3">
                <input type="hidden" class="form-control" id="myP" name="myP">
                <input type="hidden" class="form-control" name="idAluno" value="<?= @$idAluno ?>">
                <input type="submit" class="offset-3 btn btn-outline-primary px-5">
            </div>
    </form>
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

<script>
    function minhaFuncao() {
        console.log('entrou!!')
        $.ajax({

            url: 'http://localhost:9000/api/public/v1/captura/Capturar/1',
            type: 'GET',
            success: function(data) {
                // console.log(data)
                insertDB(data);

            }
        })
    }

    function insertDB(template) {

        console.log('>>1', template)
        // $("#myP").html(template);
        $("#myP").val(template);
        // document.getElementById("myP").innerHTML = template;
        // document.getElementById("biometria_campo").innerHTML = template
    }
</script>

<?php if (@$msgAlert) : ?>
    <script>
        setTimeout(alertFunc, 2000);

        function alertFunc() {
            alert('ATENÇÂO: <?= @$msgAlert ?>');
        }
    </script>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>