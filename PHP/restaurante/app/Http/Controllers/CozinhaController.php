<?php

namespace App\Http\Controllers;

use App\Services\CozinhaService;
use Illuminate\Http\Request;


class CozinhaController extends Controller{
    private $cozinhaService;

    public function __construct(CozinhaService $cozinhaService){
        $this->cozinhaService = $cozinhaService;
    }

    public function getAll(){
        return $this->cozinhaService->getAll();
    }

    public function get($id){
        return $this->cozinhaService->get($id);
    }

    public function store(Request $request){
        return $this->cozinhaService->post($request);
    }

    public function update(Request $request, $id){
        return $this->cozinhaService->update($request, $id);
    }

    public function destroy($id){
        return $this->cozinhaService->delete($id);
    }
}
