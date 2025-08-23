<?php

namespace App\Interfaces;

interface MenusServiceInterface
{
    public function getAllMenus();
    public function getMenuById($id);
    public function createMenu(array $data);
    public function updateMenu($id, array $data);
    public function deleteMenu($id);
    public function paginateMenus($perPage = 15);
} 