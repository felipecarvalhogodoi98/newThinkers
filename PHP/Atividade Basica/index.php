<?php
    include('App/Business/CozinhaBO.php');
    $cozinha = new CozinhaBO();
    try{
        $cozinha->criar();
    }catch(Exception $error){
        echo "{$error->getMessage()}\n";
    }
?>
