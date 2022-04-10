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

        $user4 = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $category4 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user4->id,
            'category_id' => $category4->id
        ]);

        $user5 = User::factory()->create([
            'name' => 'Krailos'
        ]);

        $category5 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user5->id,
            'category_id' => $category5->id
        ]);

        $user6 = User::factory()->create([
            'name' => 'Banuta'
        ]);

        $category6 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user6->id,
            'category_id' => $category6->id
        ]);

        $user7 = User::factory()->create([
            'name' => 'Banuta'
        ]);

        $category7 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user7->id,
            'category_id' => $category7->id
        ]);

        $user8 = User::factory()->create([
            'name' => 'Banuta'
        ]);

        $category8 = Category::factory()->create();

        Post::factory(5)->create([
            'user_id' => $user8->id,
            'category_id' => $category8->id
        ]);
    }
}
