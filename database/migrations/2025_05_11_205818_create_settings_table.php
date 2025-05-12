<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    //1  public function up()
    // {
    //     Schema::create('settings', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('site_title')->nullable();
    //         $table->text('site_description')->nullable();
    //         $table->string('logo')->nullable();
    //         $table->string('version')->nullable();
    //         $table->timestamps();
    //     });
    // }

    public function up()
{
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->string('site_title')->nullable();
        $table->string('site_description')->nullable();
        $table->string('site_logo')->nullable();
        $table->string('site_version')->nullable();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
