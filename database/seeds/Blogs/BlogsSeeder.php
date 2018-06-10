<?php

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = BlogCategory::all();


        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $admins = Admin::all();

                /** @var Blog $blog */
                $blog = Blog::create([
                    'title' => $faker->word,
                    'enable' => $faker->boolean(50),
                    'content' => $faker->text,
                    'view_count' => 0,
                ]);

                $blog->author()->associate($admins->random());
                $blog->updater()->associate($admins->random());
                $blog->categories()->attach($category->id);
                $blog->update();
            }
        }
    }
}
