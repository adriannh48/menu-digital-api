<?php

namespace App\Services;

use App\Models\TypeUsers;
use App\Interfaces\TypeUsersServiceInterface;

class TypeUsersService extends BaseService implements TypeUsersServiceInterface
{
    public function __construct(TypeUsers $model)
    {
        parent::__construct($model);
    }

    public function getAllTypeUsers()
    {
        return $this->all();
    }

    public function getTypeUserById($id)
    {
        return $this->find($id);
    }

    public function createTypeUser(array $data)
    {
        return $this->create($data);
    }

    public function updateTypeUser($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTypeUser($id)
    {
        return $this->delete($id);
    }

    public function paginateTypeUsers($perPage = 15)
    {
        return $this->paginate($perPage);
    }
} 