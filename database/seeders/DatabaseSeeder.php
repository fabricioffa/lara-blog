<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $category = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $category->id
        ]);

        $user2 = User::factory()->create([
            'name' => 'Krailos'
        ]);

        $category2 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user2->id,
            'category_id' => $category2->id
        ]);

        $user3 = User::factory()->create([
            'name' => 'Banuta'
        ]);

        $category3 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user3->id,
            'category_id' => $category3->id
        ]);
    }
}
