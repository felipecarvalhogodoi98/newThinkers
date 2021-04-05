<?php
    class Ingrediente{
        private String $nome;
        private String $dataValidade;
    
        public function __construct(String $nome, String $dataValidade){
            $this->nome = $nome;
            $this->dataValidade = $dataValidade;
        }
    
        public function getNome() : String{
        return $this->nome;
        }
    
        public function getDataValidade() : String{
            return $this->dataValidade;
        }
    
    }

  ?>