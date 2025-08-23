<?php

namespace App\Repositories;

use App\Models\TypeUsers;
use App\Interfaces\TypeUsersRepositoryInterface;

class TypeUsersRepository implements TypeUsersRepositoryInterface
{
    public function all()
    {
        return TypeUsers::all();
    }

    public function find($id)
    {
        return TypeUsers::find($id);
    }

    public function create(array $data)
    {
        return TypeUsers::create($data);
    }

    public function update(TypeUsers $typeUser, array $data)
    {
        $typeUser->update($data);
        return $typeUser;
    }

    public function delete(TypeUsers $typeUser)
    {
        return $typeUser->delete();
    }

    public function paginate($perPage = 15)
    {
        return TypeUsers::paginate($perPage);
    }
} 