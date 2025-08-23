<?php

namespace App\Repositories;

use App\Models\StoryUsers;
use App\Interfaces\StoryUsersRepositoryInterface;

class StoryUsersRepository implements StoryUsersRepositoryInterface
{
    public function all()
    {
        return StoryUsers::all();
    }

    public function find($id)
    {
        return StoryUsers::find($id);
    }

    public function create(array $data)
    {
        return StoryUsers::create($data);
    }

    public function update(StoryUsers $storyUser, array $data)
    {
        $storyUser->update($data);
        return $storyUser;
    }

    public function delete(StoryUsers $storyUser)
    {
        return $storyUser->delete();
    }

    public function paginate($perPage = 15)
    {
        return StoryUsers::paginate($perPage);
    }
} 