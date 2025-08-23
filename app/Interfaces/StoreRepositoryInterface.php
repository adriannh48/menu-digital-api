<?php

namespace App\Interfaces;

use App\Models\Stores;

interface StoreRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(Stores $store, array $data);
    public function delete(Stores $store);
    public function paginate($perPage = 15);
} 