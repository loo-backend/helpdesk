<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentCollectionSeeder::class);
        $this->call(PriorityCollectionSeeder::class);
        $this->call(StatusCollectionSeeder::class);
        $this->call(TicketCollectionSeeder::class);
    }
}
