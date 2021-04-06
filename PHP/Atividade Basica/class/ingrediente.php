<?php
    class Ingrediente{
        private String $nome;
        private Datetime $dataValidade;
    
        public function __construct(String $nome, Datetime $dataValidade){
            $this->nome = $nome;
            $this->dataValidade = $dataValidade;
        }
    
        public function getNome() : String{
        return $this->nome;
        }
    
        public function getDataValidade() : Datetime{
            return $this->dataValidade;
        }
        
        public function setNome(Datetime $Nome) : void{
            $this->nome = $nome;
        }
        
        public function setDataValidade(Datetime $dataValidade) : void{
            $this->dataValidade = $dataValidade;
        }
    }

  ?>