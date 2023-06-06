<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 9),
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
            'slug' => Str::slug($this->faker->sentence),
            'image' => 'image.png',
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
