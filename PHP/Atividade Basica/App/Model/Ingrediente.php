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
    
        public function getDataValidade() : string{
            return $this->dataValidade->format('Y-m-d H:i:s');
        }
        
        public function setNome(Datetime $nome) : void{
            $this->nome = $nome;
        }
        
        public function setDataValidade(Datetime $dataValidade) : void{
            $this->dataValidade = $dataValidade;
        }
    }

  ?>