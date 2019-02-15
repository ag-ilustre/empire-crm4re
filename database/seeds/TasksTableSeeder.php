<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tasks')->delete();
        
        \DB::table('tasks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Call to discuss projects and discounts.',
                'deadline' => '2019-02-18 00:00:00',
                'contact_id' => 1,
                'task_status_id' => 1,
                'created_at' => '2019-02-10 00:00:00',
                'updated_at' => '2019-02-10 00:00:00',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Call',
                'deadline' => '2019-02-12 14:00:00',
                'contact_id' => 25,
                'task_status_id' => 1,
                'created_at' => '2019-02-10 13:59:26',
                'updated_at' => '2019-02-15 03:27:28',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Submit DOAS to Documentations',
                'deadline' => '2019-02-18 12:00:00',
                'contact_id' => 3,
                'task_status_id' => 1,
                'created_at' => '2019-02-10 14:23:43',
                'updated_at' => '2019-02-10 14:23:43',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Respond to email',
                'deadline' => '2019-02-11 12:00:00',
                'contact_id' => 2,
                'task_status_id' => 1,
                'created_at' => '2019-02-10 15:34:37',
                'updated_at' => '2019-02-10 15:34:37',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Call to invite for open house.',
                'deadline' => '2019-02-15 14:00:00',
                'contact_id' => 3,
                'task_status_id' => 1,
                'created_at' => '2019-02-11 02:50:50',
                'updated_at' => '2019-02-11 02:50:50',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'Assist in loan takeout.',
                'deadline' => '2019-02-15 14:00:00',
                'contact_id' => 23,
                'task_status_id' => 1,
                'created_at' => '2019-02-11 02:59:23',
                'updated_at' => '2019-02-11 02:59:23',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'Email project details',
                'deadline' => '2019-02-15 14:00:00',
                'contact_id' => 21,
                'task_status_id' => 1,
                'created_at' => '2019-02-11 03:03:36',
                'updated_at' => '2019-02-11 03:03:36',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'Email project details',
                'deadline' => '2019-02-15 14:00:00',
                'contact_id' => 25,
                'task_status_id' => 1,
                'created_at' => '2019-02-11 03:03:48',
                'updated_at' => '2019-02-15 02:26:07',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 18,
                'name' => 'Contact after 3 months',
                'deadline' => '2019-05-15 14:00:00',
                'contact_id' => 4,
                'task_status_id' => 1,
                'created_at' => '2019-02-11 04:24:10',
                'updated_at' => '2019-02-11 04:24:10',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 73,
                'name' => 'Offer projects with discount for Valentine\'s Day',
                'deadline' => '2019-02-14 15:00:00',
                'contact_id' => 26,
                'task_status_id' => 1,
                'created_at' => '2019-02-13 13:34:30',
                'updated_at' => '2019-02-13 13:34:30',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 87,
                'name' => 'Confirm attendance to LOI',
                'deadline' => '2019-02-03 15:00:00',
                'contact_id' => 1,
                'task_status_id' => 1,
                'created_at' => '2019-02-15 03:07:06',
                'updated_at' => '2019-02-15 03:18:21',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 88,
                'name' => 'test',
                'deadline' => '2019-02-03 15:00:00',
                'contact_id' => 1,
                'task_status_id' => 1,
                'created_at' => '2019-02-15 03:07:45',
                'updated_at' => '2019-02-15 03:07:58',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}