<?php

namespace App\Interfaces;

use App\Models\StoryUsers;

interface StoryUsersRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(StoryUsers $storyUser, array $data);
    public function delete(StoryUsers $storyUser);
    public function paginate($perPage = 15);
} 