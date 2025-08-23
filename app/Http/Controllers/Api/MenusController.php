<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Exceptions\Custom\MenusNotFoundException;

use App\Http\Requests\StoreMenusRequest;
use App\Http\Requests\UpdateMenusRequest;

use App\Interfaces\MenusServiceInterface;

class MenusController extends Controller
{
    protected $menusService;

    public function __construct(MenusServiceInterface $menusService)
    {
        $this->menusService = $menusService;
    }

    public function index()
    {
        return response()->success($this->menusService->getAllMenus(), 'Listagem de menus feita com sucesso', 200);
    }

    public function show($id)
    {
        $menu = $this->menusService->getMenuById($id);
        if (!$menu) {
            throw new MenusNotFoundException();
        }
        return response()->success($menu, 'Menu encontrado com sucesso', 200);
    }

    public function store(StoreMenusRequest $request)
    {
        $menu = $this->menusService->createMenu($request->validated());
        return response()->success($menu, 'Menu criado com sucesso!', 201);
    }

    public function update(UpdateMenusRequest $request, $id)
    {
        $menu = $this->menusService->updateMenu($id, $request->validated());
    if (!$menu) {
            return response()->success([], 'Menu não encontrado', 404);
        }
        return response()->success($menu, 'Menu atualizado com sucesso.', 200);
    }

    public function destroy($id)
    {
        $result = $this->menusService->deleteMenu($id);
        if (!$result) {
            return response()->success([], 'Menu não encontrado', 404);
        }
        return response()->success([], 'Menu excluído com sucesso', 200);
    }

    public function paginate($perPage = 15)
    {
        return response()->success(
            $this->menusService->paginateMenus($perPage),
            'Listagem paginada de menus feita com sucesso',
            200
        );
    }
} 