<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([table_candidats::class,
                    table_entreprises::class,
                    table_utilisateurs::class
        ]);
    }
}
