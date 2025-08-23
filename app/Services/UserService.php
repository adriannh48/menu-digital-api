<?php

namespace App\Services;

use App\Models\User;
use App\Interfaces\UserServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUsers()
{
        return $this->all();
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function createUser(array $data)
    {
        return $this->create($data);
    }

    public function updateUser($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
