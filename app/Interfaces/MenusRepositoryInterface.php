<?php

namespace App\Interfaces;

use App\Models\Menus;

interface MenusRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(Menus $menu, array $data);
    public function delete(Menus $menu);
    public function paginate($perPage = 15);
} 