<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // USER
        User::create([
            'name' => 'Irsal Lazuard',
            'username' => 'irsal_laz',
            'email' => 'laxz@gmail.com',
            'work_place' => 'PT Bina Jaya',
            'job_position' => 'CEO',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Panji Dwi Satrio',
            'username' => 'panjidwisatrio',
            'email' => 'panjisatrio888@gmail.com',
            'avatar' => 'post-images\IbCEnf6AtzW5gcp4QkzLNUrLSqxqs2m5iBTMRetp.png',
            'work_place' => 'Chevalier Lab SAS',
            'job_position' => 'Coordinator',
            'password' => bcrypt('password123'),
        ]);

        User::factory(5)->create();

        // TAG 
        Tag::create([
            'name_tag' => 'Pakan Ternak',
            'slug' => 'pakan-ternak',
            'color' => 'blue',
            'tag_counter' => fake()->numberBetween(1, 100),
        ]);
        Tag::create([
            'name_tag' => 'Kesehatan',
            'slug' => 'kesehatan',
            'color' => 'blue',
            'tag_counter' => fake()->numberBetween(1, 100),
        ]);
        Tag::create([
            'name_tag' => 'Tips dan Trik',
            'slug' => 'tips-dan-trik',
            'color' => 'blue',
            'tag_counter' => fake()->numberBetween(1, 100),
        ]);
        Tag::create([
            'name_tag' => 'Bisnis Plan',
            'slug' => 'bisnis-plan',
            'color' => 'blue',
            'tag_counter' => fake()->numberBetween(1, 100),
        ]);
        Tag::create([
            'name_tag' => 'Big Farm',
            'slug' => 'big-farm',
            'color' => 'blue',
            'tag_counter' => fake()->numberBetween(1, 100),
        ]);

        // CATEGORY
        Category::create(
            [
                'category' => 'Sapi',
                'slug' => 'sapi',
            ]
        );
        Category::create(
            [
                'category' => 'Unggas',
                'slug' => 'unggas',
            ]
        );
        Category::create(
            [
                'category' => 'Kambing',
                'slug' => 'kambing',
            ]
        );
        Category::create(
            [
                'category' => 'Domba',
                'slug' => 'domba',
            ]
        );
        Category::create(
            [
                'category' => 'Ikan',
                'slug' => 'ikan',
            ]
        );
        Category::create(
            [
                'category' => 'Lainnya',
                'slug' => 'lainnya',
            ]
        );

        // POST 
        Post::factory(10)->create();
    }
}
