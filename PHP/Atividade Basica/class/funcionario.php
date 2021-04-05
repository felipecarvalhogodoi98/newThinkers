<?php
    class Funcionario{
        private String $nome;
        private String $atividade;
    
        public function __construct(String $nome, String $atividade){
            $this->nome = $nome;
            $this->atividade = $atividade;
        }
    
        public function getNome() : String{
            return $this->nome;
        }
        public function getAtividade() : String{
        return $this->atividade;
        }
    
    }
?>