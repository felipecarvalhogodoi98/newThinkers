<?php
    require_once("App/Model/Funcionario.php");
    class FuncionarioBO{
        private $funcionario;

        public function __construct(){}

        public function getFuncionario(){
            return $this->funcionario;
        }

        public function criar(string $nome, string $atividade){
            $this->validarDados($nome, $atividade);
            $this->funcionario = new Funcionario($nome, $atividade);
        }

        public function validarDados(string $nome, string $atividade){
            if(empty($nome) || empty($atividade))
                throw new Exception("Falta parametros para funcionario");
        }
    }

?>