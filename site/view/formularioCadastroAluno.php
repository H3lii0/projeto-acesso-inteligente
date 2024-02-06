<head>
  <link rel="stylesheet" href="<?= constant("URL_LOCAL_BASE")?>assets/css/formulario-cadastro.css">
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

  <div class="container mt-3">
  <div class="row"> 
  <div class="col-6" id="form1">
    <div class="text-center">
    <h1 class="textform">Cadastro do Aluno</h1>
    </div>
    <form action="<?= constant("URL_LOCAL_FORMS") ?>formularioCadastro.php" method="post" >
    <div class="boxformat">   
      <div class="input-group">
        <span for="Matricula" class="input-group-text" id="basic-addon1"><i class="bi bi-123"></i></span>
        <input type="text" class="form-control" id="Matricula" placeholder="Matricula" name="Matricula">
      </div>
    <div class="input-group"> 
      <span for="Nome" class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
      <input type="text" class="form-control" id="Nome" placeholder="Insira o nome" name="Nome">
    </div>
    <div class="input-group">
      <span for="dataN" class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-event"></i></span>
      <input type="date" class="form-control" id="dataN" placeholder="Insira a Data de Nascimento" name="dataN">
    </div>
    <div class="input-group">
      <span for="email" class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
      <input type="email" class="form-control" id="email" placeholder="Digite o E-mail" name="email">
    </div>
    <div class="input-group">
      <span for="Telefone" class="input-group-text" id="basic-addon1"><i class="bi bi-phone"></i></span>
      <input type="text" class="form-control" id="Telefone" placeholder="(XX) X-XXXX-XXXX" name="Telefone">
    </div>  
  
    
    <div class="input-group">
      <div class="radio-container">
        <input checked="checked" type="radio" name="Sexo" value="M" id="male" />
        <label for="male">Masculino</label>
        <input type="radio" name="Sexo" value="F" id="female" />
        <label for="female">Feminino</label>
    </div>
  </div>
    
      <!-- <span><button type="button" class="btn btn-default"><i class="bi bi-gender-male"></i> </button></span>
      <input type="radio" value="None" id="male" name="formulario" checked />
      <label for="male" class="radio" chec>Masculino</label>
      <span><button type="button" class="btn btn-default"><i class="bi bi-gender-female"></i></button></span>
      <input type="radio" value="None" id="female" name="formulario" />
      <label for="female" class="radio">Feminino</label>
      </div>
      </div> -->
   <div class=text-center>
   <div class= "form-group">
    <div class="input-group">
    <span for="inputSerie" class="input-group-text" id="basic-addon1"><i class="bi bi-journal"></i></span>
    
    <select type="text" name="Serie" class="form-select">
    <option type="text" selected hidden>Turma</option>
    <option type="text" value="1 Ano A">1 Ano A</option>
    <option type="text" value="2 Ano A">2 Ano A</option>
    <option type="text" value="3 Ano A">3 Ano A</option>
    <option type="text" value="1 Ano B">1 Ano B</option>
    <option type="text" value="2 Ano B">2 Ano B</option>
    <option type="text" value="3 Ano B">3 Ano B</option>
    </select></div>
    
  </div>
  
  <div class= "form-group">
  <div class="input-group">
    <span class="input-group-text" id="basic-addon1"><i class="bi bi-book-half"></i></span>
    
    <label for="inputCurso" id="icon"><i class="icon-envelope "></i></label>
    <select name="Curso" type="text" class="form-select">
    <option selected hidden>Selecione o Curso...</option>
    <option value="TDS">TDS</option>
    <option value="LOG">LOG</option>
    </select></div>
  </div>

  <button type="summit" class="button" >Registrar</button>
 
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

