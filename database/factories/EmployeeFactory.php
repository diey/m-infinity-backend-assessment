<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'first_name' => fake('ms_MY')->firstName,
            'last_name' => fake('ms_MY')->lastName,
            'email' => fake()->safeEmail,
            'phone' => fake('ms_MY')->phoneNumber()
        ];
    }
}
