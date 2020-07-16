<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array(
              'name' => 'Plato de entrada',
            ),
            array(
              'name' => 'Plato de fondo'
            ),
            array(
                'name' => 'Piqueos'
            )
        ));
        // $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);

    }
}
