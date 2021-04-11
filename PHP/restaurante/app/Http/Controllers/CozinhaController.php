<?php

namespace App\Http\Controllers;

use App\Models\Cozinha;

use Illuminate\Http\Request;


class CozinhaController extends Controller{
    private $model;
    
    public function __construct(Cozinha $cozinha){
        $this->model = $cozinha;
    }

    public function getAll(){
        $cozinhas = $this->model->all();
        try{
            return response() ->json($cozinhas);
        }catch(Exception $e){
            return $this->error($e->getMessage());
        }
    }

    public function get($id){
        $cozinha = $this->model->find($id);
        try{
            return response() ->json($cozinha);
        }catch(Exception $e){
            return $this->error($e->getMessage());
        }
    }

    public function store(Request $request){
        $cozinha = $this->model->create($request->all());
        
        try{
            return response() ->json($cozinha);
        }catch(Exception $e){
            return $this->error($e->getMessage());
        }
    }

    public function update($id, Request $request){
        $cozinha = $this->model->find($id)->update($request->all());
        try{
            return response() ->json($cozinha);
        }catch(Exception $e){
            return $this->error($e->getMessage());
        }
    }

    public function destroy($id){
        $this->model->find($id)->delete();
        try{
            return response() ->json(null);
        }catch(Exception $e){
            return $this->error($e->getMessage());
        }
    }
}
