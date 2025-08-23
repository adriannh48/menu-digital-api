<?php

namespace App\Repositories;

use App\Models\Stores;
use App\Interfaces\StoreRepositoryInterface;

class StoreRepository implements StoreRepositoryInterface
{
    public function all()
    {
        return Stores::all();
    }

    public function find($id)
    {
        return Stores::find($id);
    }

    public function create(array $data)
    {
        return Stores::create($data);
    }

    public function update(Stores $store, array $data)
    {
        $store->update($data);
        return $store;
    }

    public function delete(Stores $store)
    {
        return $store->delete();
    }

    public function paginate($perPage = 15)
    {
        return Stores::paginate($perPage);
    }
}
