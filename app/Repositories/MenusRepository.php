<?php

namespace App\Repositories;

use App\Models\Menus;
use App\Interfaces\MenusRepositoryInterface;

class MenusRepository implements MenusRepositoryInterface
{
    public function all()
    {
        return Menus::all();
    }

    public function find($id)
    {
        return Menus::find($id);
    }

    public function create(array $data)
    {
        return Menus::create($data);
    }

    public function update(Menus $menu, array $data)
    {
        $menu->update($data);
        return $menu;
    }

    public function delete(Menus $menu)
    {
        return $menu->delete();
    }

    public function paginate($perPage = 15)
    {
        return Menus::paginate($perPage);
    }
} 