<?php

namespace App\Http\Controllers\Site\Cozinha;

use App\Http\Controllers\Controller;
Use App\Http\Controllers\CozinhaController;

class CozinhaControllerWeb extends Controller{
    private $controller;
    public function __construct(CozinhaController $cozinhaController){
        $this->controller = $cozinhaController;
    }
    public function getAll(){
        $cozinhas = $this->controller->getAll()->content();
        $cozinhas = json_decode($cozinhas);
        return view('cozinha.index', compact('cozinhas'));
    }
    public function get($id){
        $cozinha = $this->controller->get($id)->content();
        $cozinha = json_decode($cozinha);
        return view('cozinha.cozinha', compact('cozinha'));
    }
    public function store(){
        return view('cozinha.form');
    }
    public function update($id){
        $cozinha = $this->controller->get($id)->content();
        $cozinha = json_decode($cozinha);
        return view('cozinha.form', compact('cozinha'));
    }
    public function destroy($id){
        $this->controller->destroy($id);        
        return $this->getAll();
    }
}

?>