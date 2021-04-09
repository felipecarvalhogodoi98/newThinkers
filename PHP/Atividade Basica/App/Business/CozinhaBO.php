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

        public function adicionarPedido(Pedido $p){
            $this->cozinha->setPedido($p);
        }

        public function primeiroPedido(){
            $pedidos =  $this->cozinha->getPedidos();
            return "Cliente: {$pedidos[0]->getCliente()} => Prato: {$pedidos[0]->getPrato()}";
        }

        public function entregarPedido(){
            $this->cozinha->entregarPedido();
        }

        public function imprimiFuncionarios(){
            $funcionarios = $this->cozinha->getFuncionarios();
            if(count($funcionarios) == 0){
                echo "Nao existe funcionarios";
                echo "<br>";
            }else{
                foreach($funcionarios as $f){
                    echo "Nome {$f->getNome()} => Atividade {$f->getAtividade()}" ;
                    echo "<br>";
                }
            }
        }

        public function imprimiIngredientes(){
            $ingredientes = $this->cozinha->getIngredientes();
            if(count($ingredientes) == 0){
                echo "Nao existe ingredientes";
                echo "<br>";
            }else{
                foreach($ingredientes as $i){
                    echo "Nome: {$i->getNome()} => Data validade: {$i->getDataValidade()}";
                    echo "<br>";
                }
            }
        }

        public function imprimiPedidos(){
            $pedidos = $this->cozinha->getPedidos();
            if(count($pedidos) == 0){
                echo "Nao existe pedidos";
                echo "<br>";
            }else{
                foreach($pedidos as $i){
                    echo "Cliente: {$i->getCliente()} => Prato: {$i->getPrato()}";
                    echo "<br>";
                }
            }
        }
    }
?>