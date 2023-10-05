<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <?php include_once 'template/head.html';  ?>
  <body class="d-flex flex-column h-100">
    <?php include_once 'template/header.html'; ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
        <h1 class="">Novo Contato</h1>
        <br>
        <form class="row g-3" method="POST" action="controller/contatoController.php">
          <input type="hidden" id="nrCpf" name="nrCpf" value="<?=$_GET['nrCpf']?>" >
          <div class="col-md-6">
            <label for="tpContato" class="form-label">Tipo de contato</label>
            <select id="tpContato" name="tpContato" class="form-select">
              <option selected>Escolha uma opção...</option>
              <option value="Telefone">Telefone</option>
              <option value="Email">Email</option>
              <option value="Caixa postal">Caixa postal</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="dsContato" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="dsContato" name="dsContato" >
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
