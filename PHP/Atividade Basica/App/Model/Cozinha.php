<?php
    require_once('Funcionario.php');
    require_once('Ingrediente.php');
    require_once('Pedido.php');

    class Cozinha{

    private String $nome;
    private String $pratoPrincipal;
    private int $horaAbertura;
    private int $horaFechamento;
    private $ingredientes;
    private $funcionarios;
    private $pedidos;
    
    

    public function __construct(String $nome, string $pratoPrincipal, int $horaAbertura, int $horaFechamento){
        $this->nome = $nome;
        $this->pratoPrincipal = $pratoPrincipal;
        $this->horaAbertura = $horaAbertura;
        $this->horaFechamento = $horaFechamento;

        $this->ingredientes = array();
        $this->funcionarios = array();
        $this->pedidos = array();
        
    }

    //get
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

    public function getIngredientes() : array{
        return $this->ingredientes;
    }

    public function getFuncionarios() : array{
        return $this->funcionarios;
    }

    public function getPedidos() : array{
        return $this->pedidos;
    }

    //set
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

    public function setFuncionario(Funcionario $f): void{
        array_push($this->funcionarios, $f);
    }

    public function setPedido(Pedido $p): void{
        array_push($this->pedidos, $p);
    }

    public function entregarPedido(){
        array_shift($this->pedidos);
    }


    }

?>