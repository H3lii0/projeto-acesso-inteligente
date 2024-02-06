<?php if (@$msgAlert) : ?>
    <script>
        setTimeout(alertFunc, 2000);

        function alertFunc() {
            alert('ATENÇÂO: <?= @$msgAlert ?>');
        }
    </script>
<?php endif; ?>

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
    <section>
        <!-- Titulo de conteúdo da pagina -->
        <div class="container mt-4 ">
            <div class="row">
                <div class="col-1" style="padding-left: 20px;"><a class="btn btn-outline-primary" href="<?= constant("URL_LOCAL_SITE") ?>?pagina=secretaria" class="btn btn-primary mt-4">Voltar</a></div>
                <div class="col">
                    <h2 style="text-align: center;padding-left: 0px;padding-right: 80px">
                        <?= $titulo ?>
                    </h2>
                </div>
            </div>
            <!-- Tabela com o histórico completo do aluno que será gerada de acordo com acesso ao sistema  -->
            <div class="table-responsive-sm m-2">

                <table class="table table-bordered">
                    <div class="Barra_De_Pesquisa">
                        <div class="col-md-4">
                            <form action="<?= constant("URL_LOCAL_FORMS") ?>listaAlunoController.php" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="termo" placeholder="Digite sua pesquisa">
                                    <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                    <div id="datatable">
                    </div>
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>Curso</th>
                            <th>Cadastro</th>
                            <th>Foto Aluno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($alunoRetorno as $aluno) : ?>
                            <tr>
                                <td>
                                    <strong><?= $aluno['id'] ?></strong>
                                </td>
                                <td>
                                    <?= $aluno['Matricula'] ?>
                                </td>
                                <td>
                                    <?= $aluno['Nome'] ?>
                                </td>
                                <td>
                                    <?= $aluno['Serie'] ?>
                                </td>
                                <td>
                                    <?= $aluno['Curso'] ?>
                                </td>

                                <td><a href="<?= constant("URL_LOCAL_SITE") ?>?pagina=biometria&idAluno=<?= $aluno['id'] ?>" class="btn btn-outline-primary">Biometria</a></td>

                                <td>
                                    <?php if($aluno['imagem']):?>
                                        <?= 'imagem já existe' ?>
                                        <?php else:?>
                                            <form action="<?= constant("URL_LOCAL_FORMS") ?>listaAlunoController.php" method="post" enctype="multipart/form-data">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="imagem" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required="required">
                                                    <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                                                    <button class="btn btn-outline-primary" name="submit" type="submit" id="inputGroupFileAddon04">Enviar</button>
                                                </div>
                                            </form>
                                    <?php endif;?>
                                </td>
                                    

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
                <?php

                if ($exibir_paginacao) :

                ?>
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="btn btn-outline-primary" class="page-link" href="<?= constant("URL_LOCAL_SITE") ?>?pagina=lista-aluno&page=<?= $page - 1; ?>">Anterior</a>
                        </li>
                        <?php
                        $listatotal = (count($listaAlunos) / $limit) + 1;

                        for ($i = 1; $i <= $listatotal; $i++) : ?>

                            <li class="page-item"><a class="btn btn-outline-primary" class="page-link" href="<?= constant("URL_LOCAL_SITE") ?>?pagina=lista-aluno&page=<?= $i; ?>">
                                    <?= $i; ?>
                                </a></li>

                        <?php endfor; ?>
                        <li class="page-item"><a class="btn btn-outline-primary" class="page-link" href="<?= constant("URL_LOCAL_SITE") ?>?pagina=lista-aluno&page=<?= $page + 1; ?>">Proximo</a>
                        </li>
                    </ul>
                <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Rodapé do site -->
    <div class="container">
        <div class="row">
            <footer>
                <p class="rounded float-right"><img src="<?= constant("URL_LOCAL_IMG") ?>tela/rodape.png" alt="Logo da Secretaria de Educação e Esporte do Governo de Pernambuco." class="mb-2 pt-2 flex-shrink-1 bd-highlight img-fluid "></p>
            </footer>
        </div>
    </div>
</div>