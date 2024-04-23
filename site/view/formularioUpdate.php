<?php if (@$msgAlert) : ?>
  <script>
    setTimeout(alertFunc, 2000);

    function alertFunc() {
      alert('ATENÇÂO: <?= @$msgAlert ?>');
    }
  </script>
<?php endif; ?>



<head>
  <link rel="stylesheet" href="<?= constant("URL_LOCAL_BASE") ?>assets/css/formulario-cadastro.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<div class="container mt-3">
  <div class="row">
    <header>
      <img src="<?= constant("URL_LOCAL_IMG") ?>tela/ete_logo.png" alt="Logo da ETE - Escola Técnica Estadual" class="mx-auto d-block img-fluid">
    </header>
    <div class="bg-warning p-1" style="margin-bottom: 0px;"></div>
    <div class="bg-success p-1" style="margin-bottom: 0px;"></div>
    <div class="bg-danger p-1" style="margin-bottom: 0px;"></div>
  </div>

  <a href="<?= constant("URL_LOCAL_SITE") ?>?pagina=lista-total" class="btn btn-outline-primary mt-4">Voltar</a>

  <div class="row">
    <div class="offset-3 col-sm-6 flex-shrink-1 ">
      <table class="table responsive-sm table table-borderless">
        <thead>
          <tr>
            <th>Nome</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $alunoRetorno[0]["Nome"] ?></td>
            <td><?= $alunoRetorno[0]["email"] ?></td>
            <td><?= $alunoRetorno[0]["Data_Nasc"] ?></td>
            <td><?= $alunoRetorno[0]["Curso"] ?></td>
          
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <div class="col-6" id="form1">
        <div class="text-center">
          <h1 class="textform">Cadastro do Aluno</h1>
        </div>
        <form action="<?= constant("URL_LOCAL_FORMS") ?>update.php" method="post">
        <input type="hidden" name="idAluno" value="<?=$idAluno?>">
          <div class="boxformat">
            <div class="input-group">
              <span for="Matricula" class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
              <input type="text" class="form-control" id="Matricula" placeholder="Matricula" name="Matricula" required="required" value="<?= $alunoRetorno[0]['Matricula'] ?>">
            </div>
            <div class="input-group">
              <span for="Nome" class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control" id="Nome" placeholder="Insira o nome" name="Nome" required="required" value="<?= $alunoRetorno[0]["Nome"] ?>">
            </div>
            <div class="input-group">
              <span for="dataN" class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-event"></i></span>
              <input type="date" class="form-control" id="dataN" placeholder="Insira a Data de Nascimento" name="dataN" required="required" value="<?=$alunoRetorno[0]['Data_Nasc']?>">
            </div>
            <div class="input-group">
              <span for="email" class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="email" placeholder="Digite o E-mail" name="email" required="required" value="<?= $alunoRetorno[0]["email"] ?>">
            </div>
            <div class="input-group">
              <span for="Telefone" class="input-group-text" id="basic-addon1"><i class="bi bi-phone"></i></span>
              <input type="text" class="form-control" id="Telefone" placeholder="(XX) X-XXXX-XXXX" name="Telefone" required="required" value="<?= $alunoRetorno[0]['Telefone']?>">
            </div>


            <div class="input-group">
              <div class="radio-container">
                <input  type="radio" name="Sexo"  id="male" required="required" value="M"<?=$alunoRetorno[0]['Sexo']==="M"? 'checked' : ''?> />
                <label for="male">Masculino</label>
                <input type="radio" name="Sexo" value="F"<?=$alunoRetorno[0]['Sexo']==="F"?'checked' : ''?> id="female" />
                <label for="female">Feminino</label>
              </div>
            </div>


            <div class=text-center>
              <div class="form-group">
                <div class="input-group">
                  <span for="inputSerie" class="input-group-text" id="basic-addon1"><i class="bi bi-journal"></i></span>

                  <select type="text" name="Serie" class="form-select">
                    <option type="text" selected hidden>Turma</option>
                    <option type="text" value="1 Ano A"<?= $alunoRetorno[0]['Serie']==='1 Ano A' ?'selected' : ''?>>1 Ano A</option>
                    <option type="text" value="2 Ano A"<?= $alunoRetorno[0]['Serie']==='2 Ano A' ?'selected' : ''?>>2 Ano A</option>
                    <option type="text" value="3 Ano A"<?= $alunoRetorno[0]['Serie']==='3 Ano A' ?'selected' : ''?>>3 Ano A</option>
                    <option type="text" value="1 Ano B"<?= $alunoRetorno[0]['Serie']==='1 Ano B' ?'selected' : ''?>>1 Ano B</option>
                    <option type="text" value="2 Ano B"<?= $alunoRetorno[0]['Serie']==='2 Ano B' ?'selected' : ''?>>2 Ano B</option>
                    <option type="text" value="3 Ano B"<?= $alunoRetorno[0]['Serie']==='3 Ano B' ?'selected' : ''?>>3 Ano B</option>
                  </select>
                </div>

              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-book-half"></i></span>

                  <label for="inputCurso" id="icon"><i class="icon-envelope "></i></label>
                  <select name="Curso" type="text" class="form-select">
                    <option selected hidden>Selecione o Curso...</option>
                    <option value="TDS" <?= $alunoRetorno[0]['Curso']==="TDS"?'selected' : '' ?> >TDS</option>
                    <option value="LOG" <?= $alunoRetorno[0]['Curso']==="LOG"?'selected' : ''?>>LOG</option>
                  </select>
                </div>
              </div>

              <button type="submit" class="button">Atualizar</button>

        </form>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <footer>
        <p class="rounded float-right">
          <img src="<?= constant("URL_LOCAL_IMG") ?>tela/rodape.png" alt="Logo da Secretaria de Educação e Esporte do Governo de Pernambuco." class="mb-2 pt-2 flex-shrink-1 bd-highlight img-fluid ">
        </p>
      </footer>
    </div>
  </div>