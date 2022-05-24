<?php

namespace Database\Factories;

use App\Models\Checklist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Checklist::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
