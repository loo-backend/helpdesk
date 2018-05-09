<?php

use Illuminate\Database\Seeder;
use Helpdesk\Department;

class DepartmentCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->departments() as $key => $department) {

        	if(Department::where('_id', $department['code'])->exists()) {
        		return;
        	}

        	factory(Department::class)->create([

        		'_id' => $department['code'],
        		'name' => $department['name'],
        		'email' => $department['email']

        	]);
        }
    }

    private function departments()
    {
    	return [

    		[
                'code' => 1,
    			'name' => 'Suporte',
    			'email' => 'suporte@loojas.com.br'
    		],

    		[
                'code' => 2,
    			'name' => 'Comercial',
    			'email' => 'comercial@loojas.com.br'
    		],

    		[
                'code' => 3,
    			'name' => 'Financeiro',
    			'email' => 'financeiro@loojas.com.br'
    		],

    	];

    }

}
