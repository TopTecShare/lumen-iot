<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('json_id')
            ->nullable(false);
            $table->text('json_key');
            $table->double('json_value');
            $table->integer('version_id')
                ->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_numbers');
    }
}
