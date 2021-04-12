<?php
namespace App\Services;

use App\Repositories\CozinhaRepositoryInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CozinhaService{

    private $cozinhaRepository;

    public function __construct(CozinhaRepositoryInterface $cozinhaRepository){
        $this->cozinhaRepository = $cozinhaRepository;
    }
    public function getAll(){
        try{
            $cozinha = $this->cozinhaRepository->getAll();
            if(empty($cozinha[0]))
                throw new Exception("Nao ha cozinha nos registros", Response::HTTP_BAD_REQUEST);
            return response() -> json($cozinha,Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function get($id){
        try{
            $cozinha = $this->cozinhaRepository->get($id);
            if(empty($cozinha))
                throw new Exception("Nao ha cozinha com id = {$id} nos registros", Response::HTTP_BAD_REQUEST);
            return response() -> json($cozinha,Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function store(Request $request){
        try{
            $cozinha = $this->cozinhaRepository->store($request);
            return response() -> json($cozinha,Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try{
            $cozinha = $this->cozinhaRepository->update($request, $id);
            if(empty($cozinha))
                throw new Exception("Nao ha cozinha com id = {$id} nos registros", Response::HTTP_BAD_REQUEST);
            return response() -> json($cozinha,Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id){
        try{
            $cozinha = $this->cozinhaRepository->delete($id);
            if(empty($cozinha))
                throw new Exception("Nao ha cozinha com id = {$id} nos registros", Response::HTTP_BAD_REQUEST);
            return response() -> json($cozinha,Response::HTTP_OK);
        }catch (Exception $e){
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

}
?>
