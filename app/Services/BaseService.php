<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $instance = $this->find($id);
        
        if (!$instance) {
            return null;
        }

        $instance->update($data);
        return $instance;
    }

    public function delete($id)
    {
        $instance = $this->find($id);
        
        if (!$instance) {
            return false;
        }

        return $instance->delete();
    }

    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }
}
