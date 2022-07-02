<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Employee::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'first_name' => fake('ms_MY')->firstName,
            'last_name' => fake('ms_MY')->lastName,
            'email' => fake()->safeEmail,
            'phone' => null,
        ];
    }
}
