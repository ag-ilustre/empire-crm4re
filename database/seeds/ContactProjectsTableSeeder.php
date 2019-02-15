<?php

use Illuminate\Database\Seeder;

class ContactProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_projects')->delete();
        
        \DB::table('contact_projects')->insert(array (
            0 => 
            array (
                'id' => 3,
                'contact_id' => 1,
                'project_id' => 1,
                'property_description' => 'T1-U1234',
                'property_status_id' => 1,
                'total_contract_price' => '5600200.0000',
                'estimated_commission' => '224008.0000',
                'created_at' => '2019-02-14 05:28:38',
                'updated_at' => '2019-02-14 05:28:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'contact_id' => 1,
                'project_id' => 1,
                'property_description' => 'T1-1235',
                'property_status_id' => 1,
                'total_contract_price' => '5200100.0000',
                'estimated_commission' => '208004.0000',
                'created_at' => '2019-02-14 05:29:49',
                'updated_at' => '2019-02-14 05:29:49',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'contact_id' => 1,
                'project_id' => 3,
                'property_description' => 'T2-U3450',
                'property_status_id' => 4,
                'total_contract_price' => '5400600.0000',
                'estimated_commission' => '216024.0000',
                'created_at' => '2019-02-14 19:47:42',
                'updated_at' => '2019-02-14 19:47:42',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'contact_id' => 1,
                'project_id' => 2,
                'property_description' => 'test',
                'property_status_id' => 4,
                'total_contract_price' => '1234567.0000',
                'estimated_commission' => '49382.6800',
                'created_at' => '2019-02-15 05:16:51',
                'updated_at' => '2019-02-15 05:16:51',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}