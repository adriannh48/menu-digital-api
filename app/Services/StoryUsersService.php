<?php

namespace App\Services;

use App\Models\StoryUsers;
use App\Interfaces\StoryUsersServiceInterface;

class StoryUsersService extends BaseService implements StoryUsersServiceInterface
{
    public function __construct(StoryUsers $model)
    {
        parent::__construct($model);
    }

    public function getAllStoryUsers()
    {
        return $this->all();
    }

    public function getStoryUserById($id)
    {
        return $this->find($id);
    }

    public function createStoryUser(array $data)
    {
        return $this->create($data);
    }

    public function updateStoryUser($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteStoryUser($id)
    {
        return $this->delete($id);
    }

    public function paginateStoryUsers($perPage = 15)
    {
        return $this->paginate($perPage);
    }
} 