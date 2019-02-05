<?php

use Illuminate\Database\Seeder;

class PropertyStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('property_statuses')->delete();
        
        \DB::table('property_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'reserved',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'cleared docs',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'fully paid',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'turned over',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'cancelled',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
