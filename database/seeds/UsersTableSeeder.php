<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Samantha',
                'last_name' => 'Smith',
                'username' => 'admin1',
                'email' => 'samantha.smith@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8wkKRoRS5RsMpQ979kNZT..a1bdduNyIcrLUyiWjM9cSQVEuFVY6m',
                'remember_token' => 'aFqYlvhgAvO1mrCmTAdsCDl2X6Fph8aA66WCvjanU4hW51InboUkJu27jDYs',
                'role_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'Andrew',
                'last_name' => 'Apolinar',
                'username' => 'andrewa',
                'email' => 'andrew.apolinar@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DakuLFixU4ku.sJLWe440OrFe0ThZF1.8MKb5ned3hx1rqWsl4y6K',
                'remember_token' => 'l8UcQxcw4CGrsEsfbPG2BpGAlq2avPJ3JbdxJWen8akYGfNf2UAWrokfUXxZ',
                'role_id' => 2,
                'created_at' => '2019-02-02 17:11:15',
                'updated_at' => '2019-02-02 17:11:15',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'first_name' => 'Geneva',
                'last_name' => 'Galang',
                'username' => 'genevag',
                'email' => 'geneva.galang@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Sq.zZDL/73ARoe3DvCgBouYCYrhnVN3pFgXzdTXG2ULJy.Kfmd8KK',
                'remember_token' => '01ShI6uc2kFD2G1hQuYxA5SaW6Kn4n8D4f8Br8dR8h1nXMjvTXJ3cJ7EUeQu',
                'role_id' => 2,
                'created_at' => '2019-02-02 17:14:24',
                'updated_at' => '2019-02-10 08:12:51',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'first_name' => 'Kian',
                'last_name' => 'Kissner',
                'username' => 'kiank',
                'email' => 'kian.kissner@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lx1XnOHFMkK2sFUzx32yk.EZSg8ql909hkPKG4OB4Y21wIgkSLXtG',
                'remember_token' => 'Dx6g4MyFlCNCXwJpXD0wUrq7xr8zlutNGPAoiBFoqjXSxSg9FuXYbIQiBaiF',
                'role_id' => 2,
                'created_at' => '2019-02-02 17:15:02',
                'updated_at' => '2019-02-10 07:14:57',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'first_name' => 'Clark',
                'last_name' => 'Creasman',
                'username' => 'clarkc',
                'email' => 'clark.creasman@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0TFxK7wA0BFQGkOyp6otreSY50xvF9zcdYa/8UA3WxcsL3tdwCeNi',
                'remember_token' => '52KNWV5aO41IsYueWmGEKwaCng6NSOg14t0vxgX183qBjmalPnWhwHW8eZPV',
                'role_id' => 2,
                'created_at' => '2019-02-02 17:15:43',
                'updated_at' => '2019-02-10 09:34:18',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'first_name' => 'Vivian',
                'last_name' => 'Vasta',
                'username' => 'vivianv',
                'email' => 'vivian.vasta@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$G28l/QdBj.wMEJbZKde6teZBjQPsgmPzZ9g8ka1hbV/CrJ5GPSdNq',
                'remember_token' => 'RTOeBUBl5hvq6j5tI1d52HQrLmuLJZrx7XPcfI8gsGMnA1LnqniCtP0udhAR',
                'role_id' => 2,
                'created_at' => '2019-02-02 17:16:07',
                'updated_at' => '2019-02-10 09:34:13',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'first_name' => 'Test',
                'last_name' => 'Test',
                'username' => 'test123',
                'email' => 'test@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$G28l/QdBj.wMEJbZKde6teZBjQPsgmPzZ9g8ka1hbV/CrJ5GPSdNq',
                'remember_token' => 'RTOeBUBl5hvq6j5tI1d52HQrLmuLJZrx7XPcfI8gsGMnA1LnqniCtP0udhAR',
                'role_id' => 3,
                'created_at' => '2019-02-02 17:16:07',
                'updated_at' => '2019-02-10 07:35:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}