<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsCollectionsFullText extends Migration
{

    /**
     * The name of the database connection to use.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)
        ->table('tickets', function (Blueprint $collection)
        {
            $collection->index(
                [
                    "subject" => "text",
                    "description" => "text"
                ],
                'tickets_full_text',
                null,
                [
                    "weights" => [
                        "subject" => 32,
                        "description" => 16,
                    ],
                    'name' => 'tickets_full_text'
                ]
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
        ->table('tickets', function (Blueprint $collection)
        {
            $collection->dropIndex();
            $collection->drop();
        });
    }

}
