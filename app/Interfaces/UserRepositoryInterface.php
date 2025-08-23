<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(user $user, array $data);
    public function delete(user $user);
}
