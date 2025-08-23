<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Custom\StoreNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Interfaces\StoreServiceInterface;

class StoresController extends Controller
{
    protected $storeService;

    public function __construct(StoreServiceInterface $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index()
    {
        return response()->success($this->storeService->getAllStores(), 'Listagem de lojas feita com sucesso', 200);
    }

    public function show($id)
    {
        $store = $this->storeService->getStoreById($id);
        if (!$store) {
            throw new StoreNotFoundException();
        }
        return response()->success($store, 'Loja encontrada com sucesso', 200);
    }

    public function store(StoreStoreRequest $request)
    {
        $store = $this->storeService->createStore($request->validated());
        return response()->success($store, 'Loja criada com sucesso!', 201);
    }

    public function update(UpdateStoreRequest $request, $id)
    {
        $store = $this->storeService->updateStore($id, $request->validated());
        if (!$store) {
            return response()->success([], 'Loja não encontrada', 404);
        }
        return response()->success($store, 'Loja atualizada com sucesso.', 200);
    }

    public function destroy($id)
    {
        $result = $this->storeService->deleteStore($id);
        if (!$result) {
            return response()->success([], 'Loja não encontrada', 404);
        }
        return response()->success([], 'Loja excluída com sucesso', 200);
    }

    public function paginate($perPage = 15)
    {
        return response()->success(
            $this->storeService->paginateStores($perPage), 
            'Listagem paginada de lojas feita com sucesso', 
            200
        );
    }
}