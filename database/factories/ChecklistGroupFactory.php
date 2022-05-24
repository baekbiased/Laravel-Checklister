<?php

namespace Database\Factories;

use App\Models\ChecklistGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChecklistGroupFactory extends Factory
{
    protected $model = ChecklistGroup::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
