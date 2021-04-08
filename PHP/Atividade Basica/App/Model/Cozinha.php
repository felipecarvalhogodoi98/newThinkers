<?php
    require_once('Funcionario.php');
    require_once('Ingrediente.php');

    class Cozinha{

    private String $nome;
    private String $pratoPrincipal;
    private int $horaAbertura;
    private int $horaFechamento;
    private $ingredientes;
    private $funcionarios;
    private $filaPedidos;
    

    public function __construct(String $nome, string $pratoPrincipal, int $horaAbertura, int $horaFechamento){
        $this->nome = $nome;
        $this->pratoPrincipal = $pratoPrincipal;
        $this->horaAbertura = $horaAbertura;
        $this->horaFechamento = $horaFechamento;

        $this->ingredientes = array();
        $this->funcionarios = array();
        $this->filaPedidos = array();
        
    }

    public function getNome() : String{
        return $this->nome;
    }

    public function getPratoPrincipal() : String{
        return $this->pratoPrincipal;
    }

    public function getHoraAbertura() : int{
        return $this->horaAbertura;
    }

    public function getHoraFechamento() : int{
        return $this->horaFechamento;
    }


    public function setNome(String $nome) : void{
        $this->nome = $nome;
    }

    public function setPratoPrincipal(String $pratoPrincipal) : void{
        $this->pratoPrincipal = $pratoPrincipal;
    }

    public function setHoraAbertura(String $horaAbertura) : void{
        $this->horaAbertura = $horaAbertura;
    }

    public function setHoraFechamento(String $horaFechamento) : void{
        $this->horaFechamento = $horaFechamento;
    }

    public function setIngrediente(Ingrediente $i) : void{   
        array_push($this->ingredientes, $i);
        
    }

    public function getIngredientes() : void{
        $result = count($this->ingredientes);
        if($result == 0){
           echo "Nao existe ingredientes";
           echo "<br>";
        }else{
            foreach($this->ingredientes as $i){
                echo "Nome: {$i->getNome()} => Data validade: {$i->getDataValidade()}";
                echo "<br>";
            }
        }
    }

    public function setFuncionario(Funcionario $f): void{
        array_push($this->funcionarios, $f);
    }

    public function getFuncionarios() : void{
        if(count($this->funcionarios) == 0){
            echo "Nao existe funcionarios";
            echo "<br>";
        }else{
            foreach($this->funcionarios as $f){
                echo "Nome {$f->getNome()} => Atividade {$f->getAtividade()}" ;
                echo "<br>";
            }
        }
    }

    public function setPedido(string $pedido): void{
        array_push($this->filaPedidos, $pedido);
    }

    public function getPedidos() : void{
        if(count($this->filaPedidos) == 0){
            echo "Nao existe pedidos";
            echo "<br>";
        }else{
            foreach($this->filaPedidos as $pedido){
                echo "{$pedido}" ;
                echo "<br>";
            }
        }
    }

    public function fimPrimeiroPedido(){
        array_shift($this->filaPedidos);
    }

    }

?>