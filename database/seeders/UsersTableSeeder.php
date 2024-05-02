<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = config('admin.name');
        $user->email = config('admin.email');
        $user->password =Hash::make(config('admin.password'));
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
