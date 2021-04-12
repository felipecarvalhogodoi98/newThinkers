<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface CozinhaRepositoryInterface {
    public function getAll();
    public function get($id);
    public function store(Request $request);
    public function update(Request $request, $id);
    public function delete($id);
}
