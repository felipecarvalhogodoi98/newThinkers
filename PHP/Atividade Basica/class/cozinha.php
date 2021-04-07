<?php
    require_once('funcionario.php');
    require_once('ingrediente.php');

    class Cozinha{

    private int $numeroPratos;
    private String $tipo;
    private int $numeroCozinheiros;
    private int $tempoPreparo;
    private int $horaAbertura;
    private int $horaFechamento;
    private $ingredientes;
    private int $quantMaxIngredientes;
    private $funcionarios;
    private int $quantMaxFuncionarios;

    public function __construct(String $tipo, int $horaAbertura, int $horaFechamento, int $quantMaxIngredientes, int $quantMaxFuncionarios){
        $this->tipo = $tipo;
        $this->horaAbertura = $horaAbertura;
        $this->horaFechamento = $horaFechamento;

        $this->ingredientes = array();
        $this->quantMaxIngredientes = $quantMaxIngredientes;
        $this->funcionarios = array();
        $this->quantMaxFuncionarios = $quantMaxFuncionarios;
    }

    public function getNumeroPratos(): int {
        return $this->numeroPratos;
    }

    public function getTipo() : String{
        return $this->tipo;
    }

    public function getNumeroCozinheiros() : int{
        return $this->numeroCozinheiros;
    }

    public function getTempoPreparo() : int{
        return $this->tempoPreparo;
    }

    public function getHoraAberura() : int{
        return $this->horaAbertura;
    }

    public function getHoraFechamento() : int{
        return $this->horaFechamento;
    }

    public function getQuantMaxIngredientes() : int{
        return $this->quantMaxIngredientes;
    }

    public function getQuantMaxFuncionarios() : int{
        return $this->quantMaxFuncionarios;
    }

    public function setnumeroPratos(int $numeroPratos) : void{
        $this->numeroPratos = $numeroPratos;
    }

    public function setTipo(String $tipo) : void{
        $this->tipo = $tipo;
    }

    public function setnumeroCozinheiros(int $numeroCozinheiros) : void{
        $this->numeroCozinheiros = $numeroCozinheiros;
    }

    public function setTempoPreparo(int $tempoPreparo) : void{
        $this->tempoPreparo = $tempoPreparo;
    }

    public function prepararPratos() : void{
        echo "Preparando prato";
        echo "<br>";
    }

    public function lavarLouca() : void{
        echo "Lavando a louça";
        echo "<br>";
    }

    public function addIngrediente(Ingrediente $i) : void{
        if(count($this->ingredientes) == $this->quantMaxIngredientes){
            echo "Na cozinha ja tem o maximo de ingredientes!";
            echo "<br>";
        }else{
            array_push($this->ingredientes, $i);
        }
    }

    public function getIngredientes() : void{
        $result = count($this->ingredientes);
        if($result == 0){
           echo "Nao existe ingredientes";
           echo "<br>";
        }else{
            foreach($this->ingredientes as $i){
                echo $i->getNome();
                echo "<br>";
            }
        }
    }

    public function addFuncionario(Funcionario $f): void{
        if(count($this->funcionarios) == $this->quantMaxFuncionarios){
            echo "Na cozinha ja tem o maximo de funcionarios!";
            echo "<br>";
        }else{
            array_push($this->funcionarios, $f);

        }
    }

    public function getFuncionarios() : void{
        if(count($this->funcionarios) == 0){
            echo "Nao existe funcionarios";
            echo "<br>";
        }else{
            foreach($this->funcionarios as $f){
                echo $f->getNome() ;
                echo "<br>";
            }
        }
    }

    }

?>