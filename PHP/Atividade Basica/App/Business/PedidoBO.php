<?php
    require_once("App/Model/Pedido.php");
    class PedidoBO{
        private $pedido;

        public function __construct(){}

        public function getPedido(){
            return $this->pedido;
        }

        public function criar(string $cliente, string $prato){
            $this->validarDados($cliente, $prato);
            $this->ingrediente = new Pedido($cliente, $prato);
        }

        public function validarDados(string $cliente, string $prato){
            if(empty($cliente) || empty($prato))
                throw new Exception("Falta parametros para pedido");
        }
    }

?>