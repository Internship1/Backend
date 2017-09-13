<?php

use Illuminate\Database\Seeder;

class jobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
      {
          DB::table('jobtypes')->insert([

                [
                  'type_name' => 'pramusaji',
                ],
                [
                  'type_name' => 'Shop keeper',
                ],
                [
                  'type_name' => 'endorsement',
                ],
                [
                  'type_name' => 'sales',
                ],
                [
                  'type_name' => 'blog writter',
                ],
                [
                  'type_name' => 'babysitter',
                ],
                [
                  'type_name' => 'Graphic designer',
                ],
                [
                  'type_name' => 'private teacher',
                ],
                [
                    'type_name' => 'copy writter',
                ]
            ]);

      }
}
