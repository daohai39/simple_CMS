<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('project_id')->nullable()->default(null);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->string('name');
            $table->longText('description')->nullable()->default(null);

            $table->date('started_at')->nullable()->default(null);
            $table->date('finished_at')->nullable()->default(null);

            $table->decimal('expected_cost', 12, 3)->nullable()->default(0);
            $table->decimal('actual_cost', 12, 3)->nullable()->default(0);

            $table->boolean('paid')->default(false);
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
        Schema::dropIfExists('stages');
    }
}
