<?php

    include_once '../config/Conexao.class.php';
    include_once '../model/Professores.class.php';

    $professor = new Professores();


    $nrCpf = addslashes($_POST['nrCpf']);
    $tpContato = addslashes($_POST['tpContato']);
    $dsContato = addslashes($_POST['dsContato']);

    $professor->addContatoProfessor($nrCpf, $tpContato, $dsContato);

    header("Location: ../listProfessor.php");

                                    
?>

<html>
    <p><?php echo $nrCpf; ?></p>
    <p><?php echo $tpContato; ?></p>
    <p><?php echo $dsContato; ?></p>
</html>