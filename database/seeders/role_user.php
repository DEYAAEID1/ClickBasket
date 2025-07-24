<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class role_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::create([
            'id' => '1',
            'name' => 'Deyaa_Admin',
            'email' => 'deyaaA@gmail.com',
            'password' => Hash::make('000000'),
        ]);


        $admin->hasRole('admin');

        
        $user = User::create([
            'id' => '2',
            'name' => 'Deyaa_User',
            'email' => 'deyaaU@gmail.com',
            'password' => Hash::make('000000'),
        ]);
    }
}
