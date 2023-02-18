<?php

namespace Database\Factories;

use App\Modules\Translations\Model\Translation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Translations\Model\Translation>
 */
class TranslationFactory extends Factory
{
    protected $model = Translation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'language_code' => fake()->randomElement(['en', 'ar']),
            'name' => $this->faker->realText(20),
            'description' => $this->faker->paragraph,
            'notes' => $this->faker->realText(100)
        ];
    }
}
