<?php
    include('App/Business/CozinhaBO.php');
    /*
        Cozinha recebida pelo parametro GET
        ?nome=Mineira&pratoPrincipal=Feijoada&horaAbertura=10&horaFechamento=15
    */
    $cozinha = new CozinhaBO();
    try{
        $cozinha->criar();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    if($cozinha->getCriado()){
        $cozinha->getDados();
        $cozinha->adicionarIngrediente("Feijao", new Datetime('now'));
        $cozinha->adicionarFuncionario("Gustavo", "Cozinheiro");
        $cozinha->adicionarPedido("Feijao");
        $cozinha->adicionarPedido("Arroz");

        $cozinha->imprimiIngredientes();
        $cozinha->imprimiFuncionarios();
        $cozinha->imprimiPedidos();

        $cozinha->terminaPedido();
        $cozinha->imprimiPedidos();
    }
?>
