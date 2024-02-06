<!-- Cabeçalho. -->
<div class="container">
    <div class="row">
        <header><img src="<?= constant("URL_LOCAL_IMG") ?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid"></header>
        <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
        <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
    </div>
    <section>

        <!-- Titulo de conteúdo da pagina. -->
        <div class="row">
            <h1 class="text-center"><?= $titulo ?></h1>
        </div>

        <!-- Foto do aluno. -->
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php if ($alunoRetorno[0]['imagem']) : ?>
                        <figure class="figure">
                            <img src="<?= constant("URL_LOCAL_FORMS") . $alunoRetorno[0]['imagem'] ?>" class="figure-img img-fluid rounded flex-shrink-1 mt-3 " alt="imagem do aluno" style="width: 280px; height:270px;">
                        </figure>
                    <?php else : ?>
                        <img src="<?= constant("URL_LOCAL_FORMS") ?>upload/imagem-padrao.png" alt="Foto do aluno" class="mx-auto d-block img-fluid" style="width: 280px; height:270px;">
                    <?php endif; ?>
                </div>


                <!-- Tabela com informações do aluno. -->
                <div class="offset-1 col-sm-4 flex-shrink-1 ">
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
        </div>

        <!-- Tabela atualizada com as informações recentes de entrada no sistema. -->
        <div class="container mt-3">
            <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <caption class="m-1">Ultimos dados atualizados</caption>
                    <thead class="table-dark">
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Dia da Semana</th>
                            <th>Horário de Entrada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $alunoRetorno[0]["Matricula"] ?></td>
                            <td><?= $alunoRetorno[0]["Nome"] ?></td>
                            <td><?= $alunoRetorno[0]["acesso_data"] ?></td>
                            <td><?= $alunoRetorno[0]["dia_semana"] ?></td>
                            <td><?= $alunoRetorno[0]["acesso_hora"] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Botão de redirecionamento para do histórico completo. -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end m-2">
                <a href="<?= constant("URL_LOCAL_SITE") ?>?pagina=historico&idAluno=<?= $idAluno ?>" class="btn btn-outline-primary">Historico de presença</a>
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