<?php
    include('class/includes.php');
    $cozinha = isset($_GET['cozinha']) ? $_GET['cozinha'] : "null";
    $horaAbertura = isset($_GET['horaAbertura']) ? $_GET['horaAbertura'] : 10;
    $horaFechamento = isset($_GET['horaFechamento']) ? $_GET['horaFechamento'] : 14;
    $ingrediente = isset($_GET['ingrediente']) ? $_GET['ingrediente'] : 4;
    $funcionario = isset($_GET['funcionario']) ? $_GET['funcionario'] : 4;
            
    //Simulação de um código procedural
    echo "Iniciando os trabalhos do resturante<br>";
    //nome cozinha, horaAbertura, horaFechamento, Ingrediente, funcionario
    $cozinha = new Cozinha($cozinha, $horaAbertura, $horaFechamento, $ingrediente, $funcionario);
    $i1 = new Ingrediente("Farinha", "10/12/2021");
    $i2 = new Ingrediente("Arroz","10/12/2021");
    $i3 = new Ingrediente("Carne de porco","10/12/2021");
    $i4 = new Ingrediente("Linguica","10/12/2021");
    $i5 = new Ingrediente("Feijao","10/12/2021");
    $f1 = new Funcionario("Joao", "Atentendente");
    $f2 = new Funcionario("Felipe", "Atentendente");
    $f3 = new Funcionario("Fernando", "Cozinehiro");
    $f4 = new Funcionario("Natanael", "Gerente");

    echo "Cozinha ".$cozinha->getTipo()."<br>";
    echo "Hora abertura ".$cozinha->getHoraAberura()."<br>";
    echo "Hora fechamento ".$cozinha->getHoraFechamento()."<br>";
    echo "Max ingredientes ".$cozinha->getQuantMaxIngredientes()."<br>";
    echo "Max funcionario ".$cozinha->getQuantMaxFuncionarios()."<br>";

    $cozinha->getIngredientes();
    $cozinha->getFuncionarios();

    $cozinha->addIngrediente($i1);
    $cozinha->addIngrediente($i2);
    $cozinha->addIngrediente($i3);
    $cozinha->addIngrediente($i4);
    $cozinha->addIngrediente($i5);
    echo "Add 5 ingredientes<br>";
    $cozinha->addFuncionario($f1);
    $cozinha->addFuncionario($f2);
    $cozinha->addFuncionario($f3);
    $cozinha->addFuncionario($f4);
    echo "Add 4 funcionarios<br>";
    
    $cozinha->getIngredientes();
    $cozinha->getFuncionarios();

?>