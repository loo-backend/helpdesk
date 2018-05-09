<?php

use Illuminate\Database\Seeder;
use Helpdesk\Status;

class StatusCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->status() as $status) {

        	if(Status::where('_id', $status['code'])->exists()) {
                return;
            }

        	factory(Status::class)->create([

        		'_id' => $status['code'],
        		'name' => $status['name']

        	]);
        }
    }

    private function status()
    {
    	return [

    		[
                'code' => 1,
                'name' => 'Novo|Enviado',
    		],

    		[
                'code' => 2,
                'name' => 'Respondido|Resposta do atendente',
    		],

    		[
                'code' => 3,
    			'name' => 'Aguardando resposta|Resposta do cliente',
    		],

            [
                'code' => 4,
                'name' => 'Fechado',
            ],

            [
                'code' => 5,
                'name' => 'Reaberto',
            ],

    	];

    }
}
