<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
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
        $sophie= User::factory()->create(['username'=>'sophie', 'name'=>'Sophie']);
        $japanMa= User::factory()->create(['username'=>'japan-ma', 'name'=>'Japan Ma']);
        $frontend= Category::factory()->create(['name'=>'front-end', 'slug'=>'front-end']);
        $backend= Category::factory()->create(['name'=>'back-end', 'slug'=>'back-end']);
        Blog::factory(2)->create(['category_id'=>$frontend->id, 'user_id'=>$sophie->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id, 'user_id'=>$japanMa->id]);
        Comment::factory(3)->create(['user_id'=>$japanMa->id, 'blog_id'=>1]);
        Comment::factory(3)->create(['user_id'=>$sophie->id, 'blog_id'=>2]);
    }
}
