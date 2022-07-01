<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Company::class;

    /**
     * @return array|mixed[]
     */
    public function definition(): array
    {
        $domain = fake()->domainName;
        return [
            'name' => fake('ms_MY')->company,
            'email' => fake()->word.'@'.$domain,
            'logo_path' => null,
            'website_url' => 'https://www.'.$domain,
        ];
    }
}
