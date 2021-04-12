<?php

namespace App\Repositories;

use App\Models\Cozinha;
use App\Repositories\CozinhaRepositoryInterface;
use Illuminate\Http\Request;

class CozinhaRepositoryEloquent implements CozinhaRepositoryInterface{

    private $model;

    public function __construct(Cozinha $cozinha){
        $this->model = $cozinha;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function get($id){
        return $this->model->find($id);
    }

    public function store(Request $request){
        return $this->model->create($request->all());
    }

    public function update(Request $request, $id){
        $cozinha = $this->model->find($id);
        if($cozinha) $cozinha->update($request->all());
        return $cozinha;
    }

    public function delete($id){
        $cozinha = $this->model->find($id);
        if($cozinha) $cozinha->delete();
        return $cozinha;
    }

}
