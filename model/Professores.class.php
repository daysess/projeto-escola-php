<?php

    class Professores extends Conexao {

        //Metodo para listar os professores
        public function listProfessores(){
            $pdo = parent::get_instance();
            $sql = "SELECT p.nr_cpf, p.nome, p.nivel_escolar, c.tp_contato, c.ds_contato
                    FROM tb_professor p 
                    LEFT JOIN tb_contato_professor cp ON (p.nr_cpf = cp.nr_cpf_professor)
                    LEFT JOIN tb_contato c ON (c.id = cp.id_contato)
                    ORDER BY nome ASC;";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }
        }

        //Metodo para consultar o professor por id
        public function consultaPorIdProfessores($nrCpf){
            $pdo = parent::get_instance();
            $sql = "SELECT * FROM tb_professor p 
                    WHERE p.nr_cpf = :nrCpf ";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nrCpf", $nrCpf);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }
        }

        //Metodo para cadastrar o professor
        public function addProfessor($nrCpf, $nome, $dtNascimento, $nivelEscolar, 
                                $nrIdentidade, $orgaoExpedicao, $dtExpedicao, $dsEndereco){
            $pdo = parent::get_instance();
            $sql = "INSERT INTO tb_professor 
                        (nr_cpf, nome, dt_nascimento, nivel_escolar, nr_identidade, 
                        orgao_expedicao, dt_expedicao, ds_endereco) 
                    VALUES 
                        (:nrCpf, :nome, :dtNascimento, :nivelEscolar, :nrIdentidade, 
                        :orgaoExpedicao, :dtExpedicao, :dsEndereco)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nrCpf", $nrCpf);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":dtNascimento", $dtNascimento);
            $sql->bindValue(":nivelEscolar", $nivelEscolar);
            $sql->bindValue(":nrIdentidade", $nrCnrIdentidadepf);
            $sql->bindValue(":orgaoExpedicao", $orgaoExpedicao);
            $sql->bindValue(":dtExpedicao", $dtExpedicao);
            $sql->bindValue(":dsEndereco", $dsEndereco);
            $sql->execute();

        }

        //Metodo para atualizar o professor
        public function updateProfessor($nrCpf, $nome, $dtNascimento, $nivelEscolar, 
                                $nrIdentidade, $orgaoExpedicao, $dtExpedicao, $dsEndereco){
            $pdo = parent::get_instance();
            $sql = "UPDATE tb_professor SET 
                        nome = :nome,
                        dt_nascimento = :dtNascimento,
                        nivel_escolar = :nivelEscolar,
                        nr_identidade = :nrIdentidade,
                        orgao_expedicao = :orgaoExpedicao,
                        dt_expedicao = :dtExpedicao,
                        ds_endereco = :dsEndereco
                    WHERE nr_cpf = :nrCpf ";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":dtNascimento", $dtNascimento);
            $sql->bindValue(":nivelEscolar", $nivelEscolar);
            $sql->bindValue(":nrIdentidade", $nrCnrIdentidadepf);
            $sql->bindValue(":orgaoExpedicao", $orgaoExpedicao);
            $sql->bindValue(":dtExpedicao", $dtExpedicao);
            $sql->bindValue(":dsEndereco", $dsEndereco);
            $sql->bindValue(":nrCpf", $nrCpf);
            $sql->execute();

        }

        

        //Metodo para cadastrar o contato do professor
        public function addContatoProfessor($nrCpf, $tpContato, $dsContato){
            $pdo = parent::get_instance();
            $sql = "INSERT INTO tb_contato (tp_contato, ds_contato) VALUES (:tpContato, :dsContato);            
                    INSERT INTO tb_contato_professor (nr_cpf_professor, id_contato) VALUES (:nrCpf, LAST_INSERT_ID());";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":tpContato", $tpContato);
            $sql->bindValue(":dsContato", $dsContato);
            $sql->bindValue(":nrCpf", $nrCpf);
            $sql->execute();

        }

        //Metodo para excluir o contato do professor
        public function excluirContatoProfessor($nrCpf, $dsContato){
            $pdo = parent::get_instance();
            $sql = "DELETE FROM tb_contato_professor WHERE nr_cpf_professor = :nrCpf 
                        AND id_contato = (SELECT id FROM tb_contato WHERE ds_contato = :dsContato); 
                    DELETE FROM tb_contato WHERE ds_contato = :dsContato; ";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":nrCpf", $nrCpf);
            $sql->bindValue(":dsContato", $dsContato);
            $sql->execute();
            

        }

        //Metodo para excluir o professor
        public function excluirProfessor($nrCpf){
            try {
                $pdo = parent::get_instance();
                $sql = "DELETE FROM tb_professor WHERE nr_cpf = :nrCpf ";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(":nrCpf", $nrCpf);
                $sql->execute();
                return $sql->rowCount();
            } catch (\Throwable $th) {
                return $sql->rowCount();
            }

        }


    }

?>