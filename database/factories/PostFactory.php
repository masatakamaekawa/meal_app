<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $file = $this->faker->image();
        $fileName = basename($file);
        File::move($file, storage_path('app/public/images/posts/' . $fileName));

        $faker = \Faker\Factory::create('ja_JP');
        return [
            'title' => $this->faker->word(),
            'body' => $this->faker->paragraph(),
            'category_id' => Arr::random(Arr::pluck(Post::all(), 'id')),
            'image' => $fileName,
            'user_id' => Arr::random(Arr::pluck(User::all(), 'id')),

        ];
    }
}
