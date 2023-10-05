<?php
    include_once 'config/Conexao.class.php';
    include_once 'model/Professores.class.php';

    $professor = new Professores();

    // $profUpdate = $professor->consultaPorIdProfessores($_GET['nrCpf']);
?>


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
        <form class="row g-3" method="POST" action="controller/professorUpdateController.php">
          <?php foreach($professor->consultaPorIdProfessores($_GET['nrCpf']) as $profUpdate): ?>
          <div class="col-md-3">
            <label for="nrCpf" class="form-label">Número do Cpf</label>
            <input type="text" class="form-control" id="nrCpf" name="nrCpf" value="<?=$_GET['nrCpf']; ?>" >
          </div>
          <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$profUpdate['nome']; ?>" >
          </div>
          <div class="col-md-3">
            <label for="dtNascimento" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="dtNascimento" name="dtNascimento" value="<?=$profUpdate['dt_nascimento']; ?>">
          </div>
          <div class="col-md-4">
            <label for="nivelEscolar" class="form-label">Nível escolar</label>
            <select id="nivelEscolar" name="nivelEscolar" class="form-select" 
              value="<?=$profUpdate['nivel_escolar']; ?>">
              <option <?php if ($profUpdate['nivel_escolar'] == '' ) echo 'selected' ?> >Escolha uma opção...</option>
              <option value="Ensino médio" <?php if ($profUpdate['nivel_escolar'] == 'Ensino médio' ) echo 'selected' ?> >Ensino médio</option>
              <option value="Curso técnico" <?php if ($profUpdate['nivel_escolar'] == 'Curso técnico' ) echo 'selected' ?> >Curso técnico</option>
              <option value="Curso superior" <?php if ($profUpdate['nivel_escolar'] == 'Curso superior' ) echo 'selected' ?>  >Curso superior</option>
              <option value="Pós-graduado" <?php if ($profUpdate['nivel_escolar'] == 'Pós-graduado' ) echo 'selected' ?> >Pós-graduado</option>
              <option value="Doutorado" <?php if ($profUpdate['nivel_escolar'] == 'Doutorado' ) echo 'selected' ?> >Doutorado</option>
              <option value="Mestrado" <?php if ($profUpdate['nivel_escolar'] == 'Mestrado' ) echo 'selected' ?> >Mestrado</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="nrIdentidade" class="form-label">Número da identidade</label>
            <input type="text" class="form-control" id="nrIdentidade" name="nrIdentidade" value="<?=$profUpdate['nr_identidade']; ?>">
          </div>
          <div class="col-md-2">
            <label for="orgaoExpedicao" class="form-label">Orgão expedição</label>
            <input type="text" class="form-control" id="orgaoExpedicao" name="orgaoExpedicao" value="<?=$profUpdate['orgao_expedicao']; ?>">
          </div>
          <div class="col-md-3">
            <label for="dtExpedicao" class="form-label">Data de expedição</label>
            <input type="date" class="form-control" id="dtExpedicao" name="dtExpedicao" value="<?=$profUpdate['dt_expedicao']; ?>" >
          </div>

          <div class="col-12">
            <label for="dsEndereco" class="form-label">Endereço</label>
            <textarea type="text" class="form-control" id="dsEndereco" name="dsEndereco" rows="3" 
                placeholder="Rua ... Número... Bairro... Cidade ... Estado..."><?=$profUpdate['ds_endereco']; ?></textarea>
          </div>
          
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="listProfessor.php" class="btn btn-secondary">Voltar</a>
          </div>
          <?php endforeach; ?>
        </form>
      </div>
    </main>
    <?php include_once 'template/footer.html';  ?>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
