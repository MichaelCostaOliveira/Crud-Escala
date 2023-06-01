<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EscalaTrabalhoRequest;
use App\Repositories\ColaboradorRepository;
use App\Repositories\EscalaTrabalhoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EscalaTrabalhoController extends Controller
{
    protected $escalaTrabalhoRepository;
    public function __construct(
        EscalaTrabalhoRepository $escalaTrabalhoRepository
    ){
        $this->escalaTrabalhoRepository = $escalaTrabalhoRepository;
    }
    public function index(Request $request)
    {
       try{
           return response()->json($this->escalaTrabalhoRepository->getWithFilters($request), JsonResponse::HTTP_OK);
       }catch (\Exception $e){
           return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
       }
    }

    public function store(EscalaTrabalhoRequest $request)
    {
        try{
            $this->escalaTrabalhoRepository->updateOrCreate(
                [
                    'name' => $request->get('name')
                ]);
            return response()->json('Escala salva com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }

    }
    public function show($id)
    {
        try{
            return response()->json($this->escalaTrabalhoRepository->find($id), JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function update(EscalaTrabalhoRequest $request, $id)
    {
        try{
            $this->escalaTrabalhoRepository->updateOrCreateValidate(
                [
                    'id' => $id
                ],
                [
                    'name' => $request->get('name')
                ]
            );
            return response()->json('Escala Atualizada com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($id)
    {
        try{
            $this->escalaTrabalhoRepository->delete($id);
            return response()->json('Escala removida com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function restore($id)
    {
        try{
            $this->escalaTrabalhoRepository->restore($id);
            return response()->json('Escala reativada com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
