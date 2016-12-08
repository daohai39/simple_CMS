<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('url');
            $table->string('heading')->nullable()->default(null);
            $table->string('heading_size')->nullable()->default(null);
            $table->string('heading_color')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->string('description_size')->nullable()->default(null);
            $table->string('description_color')->nullable()->default(null);
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
        Schema::dropIfExists('sliders');
    }
}
