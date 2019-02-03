<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'April',
                'last_name' => 'Austin',
                'contact_number' => '09171245678',
                'email' => 'april.austin@mail.com',
                'image_path' => 'sample.jpg',
                'occupation' => 'Manager',
                'company' => 'AMC Corporation',
                'address' => '15 Greenfelder Courts, Hungduan 8910 Bulacan',
                'stage_id' => 1,
                'user_id' => 2,
                'created_at' => '2019-02-01 00:00:00',
                'updated_at' => '2019-02-01 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'Belinda',
                'last_name' => 'Bruso',
                'contact_number' => '09177123456',
                'email' => 'belinda.bruso@mail.com',
                'image_path' => 'sample.jpg',
                'occupation' => 'Assistant Director',
                'company' => 'Globex Corporation',
                'address' => '81A/97 Brakus Parks, Poblacion, Talisay 8313 Quirino',
                'stage_id' => 2,
                'user_id' => 2,
                'created_at' => '2019-02-01 00:00:00',
                'updated_at' => '2019-02-01 00:00:00',
            ),
        ));
        
        
    }
}