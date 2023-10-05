
<?php 
    include_once 'config/Conexao.class.php';
    include_once 'model/Professores.class.php';

    $professores = new Professores();
    $mensagem = $_GET['mensagem'];
?>

<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <?php include_once 'template/head.html';  ?>
  <body class="d-flex flex-column h-100">
    <?php include_once 'template/header.html'; ?>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
       <h1 class="">Lista de Professores</h1>
       <br>
       <div class="alert alert-warning" role="alert" style="display: <?= $mensagem == '' ? 'none' : 'block' ?>">
        <?php echo $mensagem; ?>
       </div>

       <a href="professor.php" class="btn btn-success" >Novo Professor</a>
       <br><br>
       <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cpf</th>
                <th scope="col">Nível escolar</th>
                <th scope="col">Tipo contato</th>
                <th scope="col">Contato</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($professores->listProfessores() as $professor): ?>
            <tr>
                <th scope="row"> <?php echo $professor['nome']; ?> </th>
                <td> <?php echo $professor['nr_cpf']; ?> </td>
                <td> <?php echo $professor['nivel_escolar']; ?> </td>
                <td> <?php echo $professor['tp_contato']; // date("d/m/Y H:m:s", strtotime($professor['dt_cadastro']));  ?> </td>
                <td> <?php echo $professor['ds_contato']; ?> </td>
                <td>
                  <a href="contato-professor.php?nrCpf=<?=$professor['nr_cpf']; ?>" name="novoContato" class="link-warning" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                  </svg>
                  </a>
                  <a href="professor-update.php?nrCpf=<?=$professor['nr_cpf']; ?>" name="Editar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                  </a>
                  <a href="#" name="Excluir" class="link-danger" 
                    data-bs-toggle="modal" data-bs-target="#exclusaoDadosProfessorModal"
                    onclick="setDadosModal('<?=$professor['nr_cpf']; ?>', '<?= $professor['ds_contato']; ?>')" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                  </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
      </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exclusaoDadosProfessorModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="controller/professorExcluirController.php">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="ModalLabel">Atenção</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Você realmente deseja excluir esse item?
              <input type="hidden" id="nrCpf" name="nrCpf">
              <input type="hidden" id="dsContato" name="dsContato">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-primary">Sim</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include_once 'template/footer.html';  ?>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
