<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;


class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'admin',
            'email' => 'user@admin.fr',
            'email_verified_at' => now(),
            'password' => bcrypt('admintest'),
            'remember_Token' => Str::random(10),
            'is_admin' => 1,
            'approved_at' => now(),
        ]);
    }
}
