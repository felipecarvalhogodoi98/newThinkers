<?php
    require_once("App/Model/Cozinha.php");

    class CozinhaBO{

        public function __construct(){}

        public function criar(){
            $this->validarDados();
            $cozinha = new Cozinha($_GET['nome'],
                            $_GET['pratoPrincipal'], 
                            $_GET['horaAbertura'], 
                            $_GET['horaFechamento']
                        );
            echo "{$cozinha->getNome()}\n";
            echo "{$cozinha->getPratoPrincipal()}\n";
            echo "{$cozinha->getHoraAbertura()}\n";
            echo "{$cozinha->getHoraFechamento()}\n";
        }

        public function validarDados(){
            if ( !(isset($_GET['nome']) &&
            isset($_GET['pratoPrincipal']) &&
            isset($_GET['horaAbertura']) &&
            isset($_GET['horaFechamento']) )){
                throw new Exception('Falta parametros.');
            }
        }
    }
?>