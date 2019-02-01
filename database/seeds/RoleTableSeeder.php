<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
        	['name' => 'admin', 'create_at' => NULL, 'updated_at' => NULL],
        	['name' => 'agent', 'create_at' => NULL, 'updated_at' => NULL],
        	['name' => 'none', 'create_at' => NULL, 'updated_at' => NULL]
        ]);
    }
}
