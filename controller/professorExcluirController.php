<?php

    include_once '../config/Conexao.class.php';
    include_once '../model/Professores.class.php';

    $professor = new Professores();
    
    $nrCpf = addslashes($_POST['nrCpf']);
    $dsContato = addslashes($_POST['dsContato']);
   
    
    if($dsContato != ''){
        //echo 'Entrou no If';
        $professor->excluirContatoProfessor($nrCpf, $dsContato);
       
    } else if ($nrCpf != ''){
        //echo 'Entrou no Else';
        $resposta = $professor->excluirProfessor($nrCpf, $dsContato);
        if($resposta == 0){
            $mensagem = "Atenção: Professor tem vínculo com classe/alunos e não pode ser excluído.";
        }
    }

    header("Location: ../listProfessor.php?mensagem=$mensagem");
    

                                    
?>
<html>
    <p><?php echo $mensagem; ?></p>
    <p><?php echo $nrCpf; ?></p>
    <p><?php echo $dsContato; ?></p>
</html>