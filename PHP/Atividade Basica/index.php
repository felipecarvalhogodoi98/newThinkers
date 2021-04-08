<?php
    include('App/Business/CozinhaBO.php');
    include('App/Business/FuncionarioBO.php');
    include('App/Business/IngredienteBO.php');
    /*
        Cozinha recebida pelo parametro GET
        ?nome=Mineira&pratoPrincipal=Feijoada&horaAbertura=10&horaFechamento=15
    */
    $cozinha = new CozinhaBO();
    $ingrediente = new IngredienteBO();
    $ingrediente->criar("Feijao", new datetime('now'));
    $funcionario = new FuncionarioBO();
    $funcionario->criar("Gustavo", "Cozinheiro");
    try{
        $cozinha->criar();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    if($cozinha->getCriado()){
        $cozinha->getDados();
        $cozinha->adicionarFuncionario($funcionario->getFuncionario());
        $cozinha->adicionarIngrediente($ingrediente->getIngrediente());

        $cozinha->imprimiFuncionarios();
        $cozinha->imprimiIngredientes();

    }
?>
