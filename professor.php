<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <?php include_once 'template/head.html';  ?>
  <body class="d-flex flex-column h-100">
    <?php include_once 'template/header.html'; ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
        <h1 class="">Novo Professor</h1>
        <br>
        <form class="row g-3" method="POST" action="controller/professorController.php">
          <div class="col-md-3">
            <label for="nrCpf" class="form-label">Número do Cpf</label>
            <input type="text" class="form-control" id="nrCpf" name="nrCpf" >
          </div>
          <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" >
          </div>
          <div class="col-md-3">
            <label for="dtNascimento" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="dtNascimento" name="dtNascimento" >
          </div>
          <div class="col-md-4">
            <label for="nivelEscolar" class="form-label">Nível escolar</label>
            <select id="nivelEscolar" name="nivelEscolar" class="form-select">
              <option selected>Escolha uma opção...</option>
              <option value="Ensino médio">Ensino médio</option>
              <option value="Curso técnico">Curso técnico</option>
              <option value="Curso superior">Curso superior</option>
              <option value="Pós-graduado">Pós-graduado</option>
              <option value="Doutorado">Doutorado</option>
              <option value="Mestrado">Mestrado</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="nrIdentidade" class="form-label">Número da identidade</label>
            <input type="text" class="form-control" id="nrIdentidade" name="nrIdentidade" >
          </div>
          <div class="col-md-2">
            <label for="orgaoExpedicao" class="form-label">Orgão expedição</label>
            <input type="text" class="form-control" id="orgaoExpedicao" name="orgaoExpedicao" >
          </div>
          <div class="col-md-3">
            <label for="dtExpedicao" class="form-label">Data de expedição</label>
            <input type="date" class="form-control" id="dtExpedicao" name="dtExpedicao" >
          </div>

          <div class="col-12">
            <label for="dsEndereco" class="form-label">Endereço</label>
            <textarea type="text" class="form-control" id="dsEndereco" name="dsEndereco" rows="3" placeholder="Rua ... Número... Bairro... Cidade ... Estado..."></textarea>
          </div>
          
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="listProfessor.php" class="btn btn-secondary">Voltar</a>
          </div>
        </form>
      </div>
    </main>
    <?php include_once 'template/footer.html';  ?>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
