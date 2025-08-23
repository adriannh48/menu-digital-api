<?php

namespace App\Services;

use App\Models\Menus;
use App\Interfaces\MenusServiceInterface;

class MenusService extends BaseService implements MenusServiceInterface
{
    public function __construct(Menus $model)
    {
        parent::__construct($model);
    }

    public function getAllMenus()
    {
        return $this->all();
    }

    public function getMenuById($id)
    {
        return $this->find($id);
    }

    public function createMenu(array $data)
    {
        return $this->create($data);
    }

    public function updateMenu($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMenu($id)
    {
        return $this->delete($id);
    }

    public function paginateMenus($perPage = 15)
    {
        return $this->paginate($perPage);
    }
} 