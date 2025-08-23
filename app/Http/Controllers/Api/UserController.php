<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Custom\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->success($this->userService->getAllUsers(),'Listagem feita com sucesso', 200);

    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            throw new UserNotFoundException();
        }
        return response()->success($user, 'Busca por ID do usuario', 200);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        return response()->success($user, 'Usuario criado com sucesso!', 201);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->validated());
        if (!$user) {
            return response()->success([], 'Usuário não encontrado', 404);
        }
        return response()->success($user, 'Usuario atualizado com sucesso.', 200);
    }

    public function destroy($id)
    {
        $user = $this->userService->deleteUser($id);
        if (!$user) {
            return response()->success([], 'Usuário não encontrado', 404);
        }
        return response()->success([], 'Usuário excluído com sucesso', 200);
    }
}
