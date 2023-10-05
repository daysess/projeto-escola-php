<?php

    include_once '../config/Conexao.class.php';
    include_once '../model/Professores.class.php';

    $professor = new Professores();


    $nrCpf = addslashes($_POST['nrCpf']);
    $nome = addslashes($_POST['nome']);
    $dtNascimento = addslashes($_POST['dtNascimento']);
    $nivelEscolar = addslashes($_POST['nivelEscolar']);
    $nrIdentidade = addslashes($_POST['nrIdentidade']);
    $orgaoExpedicao = addslashes($_POST['orgaoExpedicao']);
    $dtExpedicao = addslashes($_POST['dtExpedicao']);
    $dsEndereco = addslashes($_POST['dsEndereco']);

    $professor->addProfessor($nrCpf, $nome, $dtNascimento, $nivelEscolar, 
    $nrIdentidade, $orgaoExpedicao, $dtExpedicao, $dsEndereco);

    header("Location: ../listProfessor.php");

                                    
?>