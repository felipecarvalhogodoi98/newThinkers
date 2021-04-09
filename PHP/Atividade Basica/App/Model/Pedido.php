<?php
    class Pedido{
        private String $cliente;
        private String $prato;
    
        public function __construct(String $cliente, String $prato){
            $this->cliente = $cliente;
            $this->prato = $prato;
        }
    
        public function getCliente() : String{
            return $this->cliente;
        }
        public function getPrato() : String{
            return $this->prato;
        }

        public function setCliente(String $cliente) : void{
            $this->cliente = $cliente;
        }
        
        public function setPrato(String $prato) : void{
            $this->prato = $prato;
        }
    
    }
?>