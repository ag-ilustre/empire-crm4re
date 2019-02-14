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
                'id' => 1,
                'contact_id' => 1,
                'project_id' => 1,
                'property_description' => 'T1-U919',
                'property_status_id' => 2,
                'total_contract_price' => '6345000.0000',
                'estimated_commission' => '253800.0000',
                'created_at' => NULL,
                'updated_at' => '2019-02-13 08:23:22',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'contact_id' => 1,
                'project_id' => 2,
                'property_description' => 'T1-U919',
                'property_status_id' => 2,
                'total_contract_price' => '6345000.0000',
                'estimated_commission' => '253800.0000',
                'created_at' => NULL,
                'updated_at' => '2019-02-13 08:23:22',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}