<?php
    require_once("App/Model/Ingrediente.php");
    class IngredienteBO{
        private $ingrediente;

        public function __construct(){}

        public function getIngrediente(){
            return $this->ingrediente;
        }

        public function criar(string $nome, datetime $data){
            $this->validarDados($nome, $data);
            $this->ingrediente = new Ingrediente($nome, $data);
        }

        public function validarDados(string $nome, datetime $data){
            if(empty($nome) || empty($data))
                throw new Exception("Falta parametros para ingrediente");
        }
    }

?>