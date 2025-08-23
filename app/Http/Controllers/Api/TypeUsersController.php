<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Custom\TypeUsersNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeUsersRequest;
use App\Http\Requests\UpdateTypeUsersRequest;
use App\Interfaces\TypeUsersServiceInterface;

class TypeUsersController extends Controller
{
    protected $typeUsersService;

    public function __construct(TypeUsersServiceInterface $typeUsersService)
    {
        $this->typeUsersService = $typeUsersService;
    }

    public function index()
    {
        return response()->success($this->typeUsersService->getAllTypeUsers(), 'Listagem de tipos de usuário feita com sucesso', 200);
    }

    public function show($id)
    {
        $typeUser = $this->typeUsersService->getTypeUserById($id);
        if (!$typeUser) {
            throw new TypeUsersNotFoundException();
        }
        return response()->success($typeUser, 'Tipo de usuário encontrado com sucesso', 200);
    }

    public function store(StoreTypeUsersRequest $request)
    {
        $typeUser = $this->typeUsersService->createTypeUser($request->validated());
        return response()->success($typeUser, 'Tipo de usuário criado com sucesso!', 201);
    }

    public function update(UpdateTypeUsersRequest $request, $id)
    {
        $typeUser = $this->typeUsersService->updateTypeUser($id, $request->validated());
        if (!$typeUser) {
            return response()->success([], 'Tipo de usuário não encontrado', 404);
        }
        return response()->success($typeUser, 'Tipo de usuário atualizado com sucesso.', 200);
    }

    public function destroy($id)
    {
        $result = $this->typeUsersService->deleteTypeUser($id);
        if (!$result) {
            return response()->success([], 'Tipo de usuário não encontrado', 404);
        }
        return response()->success([], 'Tipo de usuário excluído com sucesso', 200);
    }

    public function paginate($perPage = 15)
    {
        return response()->success(
            $this->typeUsersService->paginateTypeUsers($perPage),
            'Listagem paginada de tipos de usuário feita com sucesso',
            200
        );
    }
} 