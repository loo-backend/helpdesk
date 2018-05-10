<?php

use Illuminate\Database\Seeder;
use Helpdesk\Priority;

class PriorityCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->priorities() as $priority) {

        	if(Priority::where('_id', $priority['code'])->exists()) {
                return;
            }

        	factory(Priority::class)->create([

        		'_id' => $priority['code'],
        		'name' => $priority['name'],

        	]);
        }
    }

    private function priorities()
    {
    	return [

            [
                'code' => 1,
                'name' => 'Alta',
            ],

    		[
                'code' => 2,
    			'name' => 'Média',
    		],

            [
                'code' => 3,
                'name' => 'Baixa',
            ],

    	];

    }
}
