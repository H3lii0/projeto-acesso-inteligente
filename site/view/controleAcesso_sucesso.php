
 <!-- Cabeçalho do site -->
 <div class="container mt-3">
     <div class="row">
         <header>
             <img src="<?= constant("URL_LOCAL_IMG") ?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid">
         </header>
         <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
         <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
         <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
     </div>

     <section>
         <!-- Titulo do conteúdo da pagina -->
         <div class="row">
             <div class="col">
                 <h1 class="text-center"><?= $titulo ? $titulo : null ?></h1>
             </div>
         </div>
         <div class="row">
             <div class="">

                 <div class="alert alert-success">
                     <strong>SUCESSO</strong>
                 </div>

                 <!-- Campo com as informações do aluno  -->
                 <div class="row">
                     <div class="col-sm-5 mb-3 mt-3">
                         <h4 style="padding-left: 10px;">Seja bem vindo(a) <?= $alunoRetorno[0]['Nome'] ?></h4>
                         <span style="padding: 10px;">Matricula: <?= $alunoRetorno[0]['Matricula'] ?></span><br />
                         <span style="padding: 10px;">Data nascimento: <?= $alunoRetorno[0]['Data_Nasc'] ?></span><br />
                         <span style="padding: 10px;">Curso: <?= $alunoRetorno[0]['Curso'] ?></span><br />
                         <span style="padding: 10px;">Serie: <?= $alunoRetorno[0]['Serie'] ?></span>
                     </div>
                     <!-- Imagem do aluno  -->
                     <div class="offset-1 col-sm-3 mb-3">
                         <?php if ($alunoRetorno[0]['imagem']):?>
                             <figure class="figure">
                                 <img src="<?= constant("URL_LOCAL_FORMS") . $alunoRetorno[0]['imagem'] ?>" class="figure-img img-fluid rounded flex-shrink-1 mt-3 " alt="imagem do aluno" style="width: 280px; height:275px;">
                             </figure>
                         <?php else : ?>
                            <img src="<?= constant("URL_LOCAL_FORMS") ?>upload/imagem-padrao.png" alt="Foto do aluno" class="mx-auto d-block img-fluid" style="width: 280px; height:290px;">
                         <?php endif; ?>
                     </div>

                     <!-- Animação check de comfimação de acesso ao sistema -->
                     <div class="col-sm-3 mt-5 mb-2 ">
                         <div id="container">
                             <svg viewBox="0 0 100 100">
                                 <circle cx="50" cy="50" r="45" />
                                 <path class="checkmark" d="M 25 50 L 43 68 L 75 32" />
                             </svg>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Rodapé do site -->
     <div class="row">
         <footer>
             <p class="rounded float-right p-0">
                 <img src="<?= constant("URL_LOCAL_IMG") ?>tela/rodape.png" alt="Logo da Secretaria de Educação e Esporte do Governo de Pernambuco." class="mb-1 ml-1 pt-2 flex-shrink-1 bd-highlight img-fluid ">
             </p>
         </footer>
     </div>
 </div>