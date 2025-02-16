<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory(10)->create();
        // courses::create([
        //     'name' => 'Course 1',
        //     'description' => 'This is course 1',
        //     'duration' => 100,
        //     'field' => 'IT',
        //     'user_id' => User::first()->id,
        // ]);
    }
}
