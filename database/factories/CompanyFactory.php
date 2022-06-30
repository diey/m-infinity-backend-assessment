<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        $domain = fake()->domainName;
        return [
            'name' => fake('ms_MY')->company,
            'email' => fake()->word.'@'.$domain,
            'logo_path' => fake()->imageUrl,
            'website_url' => 'https://www.'.$domain,
        ];
    }
}
