<?php

namespace App\Services;

use App\Models\Stores;
use App\Interfaces\StoreServiceInterface;

class StoreService extends BaseService implements StoreServiceInterface
{
    public function __construct(Stores $model)
    {
        parent::__construct($model);
    }

    public function getAllStores()
    {
        return $this->all();
    }

    public function getStoreById($id)
    {
        return $this->find($id);
    }

    public function createStore(array $data)
    {
        return $this->create($data);
    }

    public function updateStore($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteStore($id)
    {
        return $this->delete($id);
    }

    public function paginateStores($perPage = 15)
    {
        return $this->paginate($perPage);
    }
} 