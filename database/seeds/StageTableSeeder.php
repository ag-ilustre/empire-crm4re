<?php

use Illuminate\Database\Seeder;

class StageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stage::insert([
        	['name' => 'lead', 'create_at' => NULL, 'updated_at' => NULL],
        	['name' => 'prospect', 'create_at' => NULL, 'updated_at' => NULL],
        	['name' => 'active', 'create_at' => NULL, 'updated_at' => NULL],
        	['name' => 'conditional', 'create_at' => NULL, 'updated_at' => NULL],
        	['name' => 'customer', 'create_at' => NULL, 'updated_at' => NULL]
        ]);
    }
}
