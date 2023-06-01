<?php

namespace App\Repositories;

use App\Models\EscalaTrabalho;

class EscalaTrabalhoRepository extends BaseRepository
{
    public function __construct(EscalaTrabalho $model)
    {
        $this->model = $model;
    }

    public function getWithFilters($request, $perPage = 10, $page = 1, $order = 'asc'){

        if ($request->filled('search')){
            $this->model = $this->model->where('name', 'like', '%'.$request->get('search').'%');
        }

        if ($request->filled('order_by')){
            if ($request->filled('order')){
                $order = $request->get('order');
            }
            $this->model = $this->model->orderBy($request->get('order_by'), $order);
        }

        if ($request->filled('perPage')){
            $perPage = $request->get('perPage');
        }

        if ($request->filled('page')){
            $page = $request->get('page');
        }

        return $this->model->paginate($perPage, ['*'], 'page', $page);
    }
}
