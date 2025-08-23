<?php

namespace App\Interfaces;

interface StoryUsersServiceInterface
{
    public function getAllStoryUsers();
    public function getStoryUserById($id);
    public function createStoryUser(array $data);
    public function updateStoryUser($id, array $data);
    public function deleteStoryUser($id);
    public function paginateStoryUsers($perPage = 15);
} 