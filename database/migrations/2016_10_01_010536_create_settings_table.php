<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Setting;
class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->string('type')->default(Setting::TYPE_TEXT);
            $table->text('value')->nullable();
            $table->boolean('default')->default(false);
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
        //
        Schema::dropIfExists('settings');
    }
}
