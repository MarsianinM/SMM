<?php
namespace Modules\Pages\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Pages\Entities\Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence;
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'quote' => Str::random(20),
            'content' => Str::random(100),
            'active' => '1',
            'parent_id' => rand(0, 12),
            'seo_title' => Str::random(20),
            'seo_description' => Str::random(20),
            'seo_keywords' => Str::random(20),
        ];
    }
}

