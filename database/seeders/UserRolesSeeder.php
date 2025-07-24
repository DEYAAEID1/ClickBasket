<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::find(1);  

        $user->syncRoles(['admin']);
        
        $user = User::find(2);  

        $user->syncRoles(['user']);
    }



}
