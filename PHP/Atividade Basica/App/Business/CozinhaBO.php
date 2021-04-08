<?php
    require_once("App/Model/Cozinha.php");

    class CozinhaBO{

        private bool $criado;
        private $cozinha;

        public function __construct(){
            $this->criado = false;
        }

        public function getCriado() : bool{ 
            return $this->criado; 
        }

        public function getDados() : void{ 
            echo "<b>Nome </b>{$this->cozinha->getNome()}<br>";
            echo "<b>PratoPrincipal </b>{$this->cozinha->getPratoPrincipal()}<br>";
            echo "<b>HoraAberuta </b>{$this->cozinha->getHoraAbertura()}<br>";
            echo "<b>HoraFechamento </b>{$this->cozinha->getHoraFechamento()}<br>";
        }

        public function criar(){
            $this->validarDados();
            $this->cozinha = new Cozinha($_GET['nome'],
                            $_GET['pratoPrincipal'], 
                            $_GET['horaAbertura'], 
                            $_GET['horaFechamento']
                        );
            $this->criado = true;
        }

        public function validarDados(){
            if ( !(isset($_GET['nome']) &&
            isset($_GET['pratoPrincipal']) &&
            isset($_GET['horaAbertura']) &&
            isset($_GET['horaFechamento']) )){
                throw new Exception('Falta parametros pelo metodo GET.');
            }
        }

        public function adicionarFuncionario(Funcionario $f){
            $this->cozinha->setFuncionario($f);
        }

        public function adicionarIngrediente(Ingrediente $i){
            $this->cozinha->setIngrediente($i);
        }

        public function imprimiFuncionarios(){
            $this->cozinha->getFuncionarios();
        }

        public function imprimiIngredientes(){
            $this->cozinha->getIngredientes();
        }
    }
?>