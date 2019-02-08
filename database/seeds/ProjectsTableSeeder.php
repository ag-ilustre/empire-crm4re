<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Atlas Residences',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cyllene Residences',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Calypso Residences',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Leda Residences',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Galatea Residences',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
