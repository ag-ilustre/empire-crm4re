<?php

use Illuminate\Database\Seeder;

class TaskStatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('task_statuses')->delete();
        
        \DB::table('task_statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'pending',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'completed',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}