<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class RolesSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
   */
   public function run()
{
     // تحقق من وجود الدور قبل إضافته
     if (!FacadesDB::table('roles')->where('name', 'admin')->exists()) {
            FacadesDB::table('roles')->insert([
                'name' => 'admin',
                'display_name' => 'Administrator',
            ]);
        }
        // تحقق من وجود دور المستخدم العادي قبل إضافته
        if (!FacadesDB::table('roles')->where('name', 'user')->exists()) {
            FacadesDB::table('roles')->insert([
                'name' => 'user',
                'display_name' => 'Regular User',
            ]);
        }
}

}
