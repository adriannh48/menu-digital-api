<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeUsers;

class TypeUsersSeeder extends Seeder
{
    public function run()
    {
        TypeUsers::factory(10)->create();
    }
} 