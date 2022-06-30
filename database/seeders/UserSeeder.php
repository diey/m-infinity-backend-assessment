<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $administrator = new User();
        $administrator->name = 'Mr Administrator';
        $administrator->email = 'admin@example.com';
        $administrator->email_verified_at = Carbon::now();
        $administrator->password = Hash::make('password');
        $administrator->save();
    }
}
