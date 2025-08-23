<?php

namespace App\Interfaces;

use App\Models\TypeUsers;

interface TypeUsersRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(TypeUsers $typeUser, array $data);
    public function delete(TypeUsers $typeUser);
    public function paginate($perPage = 15);
} 