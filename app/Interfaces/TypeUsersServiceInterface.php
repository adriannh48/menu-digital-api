<?php

namespace App\Interfaces;

interface TypeUsersServiceInterface
{
    public function getAllTypeUsers();
    public function getTypeUserById($id);
    public function createTypeUser(array $data);
    public function updateTypeUser($id, array $data);
    public function deleteTypeUser($id);
    public function paginateTypeUsers($perPage = 15);
} 