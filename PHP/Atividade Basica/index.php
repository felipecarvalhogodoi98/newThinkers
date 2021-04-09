<?php
    include('App/Business/CozinhaBO.php');
    include('App/Business/FuncionarioBO.php');
    include('App/Business/IngredienteBO.php');
    include('App/Business/PedidoBO.php');
    /*
        Cozinha recebida pelo parametro GET
        ?nome=Mineira&pratoPrincipal=Feijoada&horaAbertura=10&horaFechamento=15
    */
    $cozinha = new CozinhaBO();
    
    $ingrediente = new IngredienteBO();
    $ingrediente->criar("Feijao", new datetime('now'));
    
    $funcionario = new FuncionarioBO();
    $funcionario->criar("Gustavo", "Cozinheiro");

    $pedido1 = new Pedido("cliente1", "feijao");
    $pedido2 = new Pedido("cliente2", "arroz");

    try{
        $cozinha->criar();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    if($cozinha->getCriado()){
        $cozinha->getDados();
        $cozinha->adicionarFuncionario($funcionario->getFuncionario());
        $cozinha->adicionarIngrediente($ingrediente->getIngrediente());

        echo "<b>Funcionarios</b><br>";
        $cozinha->imprimiFuncionarios();

        echo "<b>Ingredientes</b><br>";
        $cozinha->imprimiIngredientes();

        echo "<b>Pedidos</b><br>";
        $cozinha->adicionarPedido($pedido1);
        $cozinha->adicionarPedido($pedido2);
        $cozinha->imprimiPedidos();

        echo "<b>Primeiro pedido</b><br>{$cozinha->primeiroPedido()}<br>";
        $cozinha->entregarPedido();

        echo "<b>Apos entregar um pedido</b><br>";
        $cozinha->imprimiPedidos();

    }
?>
