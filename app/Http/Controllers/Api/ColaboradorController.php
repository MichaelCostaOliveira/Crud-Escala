<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColaboradorRequest;
use App\Http\Requests\EscalaTrabalhoRequest;
use App\Repositories\ColaboradorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    protected $colaboradorRepository;
    public function __construct(
        ColaboradorRepository $colaboradorRepository
    ){
        $this->colaboradorRepository = $colaboradorRepository;
    }
    public function index(Request $request)
    {
       try{
           return response()->json($this->colaboradorRepository->getWithFilters($request), JsonResponse::HTTP_OK);
       }catch (\Exception $e){
           return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
       }
    }
    public function store(ColaboradorRequest $request)
    {
        try{
            $this->colaboradorRepository->updateOrCreate(
                [
                    'name' => $request->get('name'),
                    'escala_trabalho_id' =>  $request->get('escala_trabalho_id'),
                    'matricula' => $request->get('matricula'),
                    'cpf' => $request->get('cpf')
                ]);
            return response()->json('Colaborador salvo com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }

    }
    public function show($id)
    {
        try{
            return response()->json($this->colaboradorRepository->find($id), JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function update(ColaboradorRequest $request, $id)
    {
        try{
            $this->colaboradorRepository->updateOrCreateValidate(
                [
                    'id' => $id
                ],
                [
                    'name' => $request->get('name'),
                    'escala_trabalho_id' =>  $request->get('escala_trabalho_id'),
                    'matricula' => $request->get('matricula'),
                    'cpf' => $request->get('cpf')
                ]
            );
            return response()->json('Colaborador atualizado com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($id)
    {
        try{
            $this->colaboradorRepository->delete($id);
            return response()->json('Colaborador removida com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    public function restore($id)
    {
        try{
            $this->colaboradorRepository->restore($id);
            return response()->json('Colaborador reativado com sucesso!', JsonResponse::HTTP_OK);
        }catch (\Exception $e){
            dd($e);
            return response()->json($e->getMessage(), JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
