<?php

    class Aluno {
        public static function getAll(){
            //Fazendo conexão com o banco
            $conn = ConnectionToDB::getConnection();
            
            //Fazendo consulta
            $queryRequest = 'SELECT * FROM Alunos';
            $queryRequest = $conn->prepare($queryRequest); //Preparando consulta
            $queryRequest->execute(); //Realizando consulta

            $queryResponse = array();

            foreach ($queryRequest->fetchObject('Aluno') as $row) {
                $queryResponse = $row;
            }

            if(!$queryResponse){
                throw new Exception("Não foi encontrado nenhum registro de aluno.");
            }

            return $queryResponse;
        }

        public static function getByID($alunoID){

            $conn = ConnectionToDB::getConnection();

            $queryRequest = "SELECT * FROM Alunos :id";
            $queryRequest = $conn->prepare($queryRequest);
            $queryRequest->bindValue(':id', $alunoID, PDO::PARAM_INT);
            $queryRequest->execute();

            $queryResponse = $queryRequest->fetchObject('Aluno');

            if(!$queryResponse){
                throw new Exception("Não foi possível encontrar nenhum registro de aluno no banco");
            }

            return $queryResponse;
        }
    }

?>