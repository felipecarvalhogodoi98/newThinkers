<?php
    include('class/cozinha.php');
    $cozinha = isset($_GET['cozinha']) ? $_GET['cozinha'] : "null";
    $horaAbertura = isset($_GET['horaAbertura']) ? $_GET['horaAbertura'] : 10;
    $horaFechamento = isset($_GET['horaFechamento']) ? $_GET['horaFechamento'] : 14;
    $ingrediente = isset($_GET['ingrediente']) ? $_GET['ingrediente'] : 4;
    $funcionario = isset($_GET['funcionario']) ? $_GET['funcionario'] : 4;
            
    //Simulação de um código procedural
    echo "Iniciando os trabalhos do resturante<br>";
    //nome cozinha, horaAbertura, horaFechamento, Ingrediente, funcionario
    $cozinha = new Cozinha($cozinha, $horaAbertura, $horaFechamento, $ingrediente, $funcionario);
    $i1 = new Ingrediente("Farinha", new DateTime());
    $i2 = new Ingrediente("Arroz",new DateTime());
    $i3 = new Ingrediente("Carne de porco",new DateTime());
    $i4 = new Ingrediente("Linguica",new DateTime());
    $i5 = new Ingrediente("Feijao",new DateTime());
    $f1 = new Funcionario("Joao", "Atentendente");
    $f2 = new Funcionario("Felipe", "Atentendente");
    $f3 = new Funcionario("Fernando", "Cozinehiro");
    $f4 = new Funcionario("Natanael", "Gerente");

    echo "<b>Cozinha</b> ".$cozinha->getTipo()."<br>";
    echo "<b>Hora abertura</b> ".$cozinha->getHoraAberura()."<br>";
    echo "<b>Hora fechamento</b> ".$cozinha->getHoraFechamento()."<br>";
    echo "<b>Max ingredientes</b> ".$cozinha->getQuantMaxIngredientes()."<br>";
    echo "<b>Max funcionario</b> ".$cozinha->getQuantMaxFuncionarios()."<br>";

    $cozinha->getIngredientes();
    $cozinha->getFuncionarios();

    $cozinha->addIngrediente($i1);
    $cozinha->addIngrediente($i2);
    $cozinha->addIngrediente($i3);
    $cozinha->addIngrediente($i4);
    $cozinha->addIngrediente($i5);

    $cozinha->addFuncionario($f1);
    $cozinha->addFuncionario($f2);
    $cozinha->addFuncionario($f3);
    $cozinha->addFuncionario($f4);

    echo "<b>Ingredientes</b><br>";
    $cozinha->getIngredientes();
    echo "<b>Funcionarios</b><br>";
    $cozinha->getFuncionarios();

    echo "<pre>";
    print_r($cozinha);
