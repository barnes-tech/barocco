<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->boolean('display_brand')->default(1);
            $table->boolean('display_menu')->default(0);
            $table->string('about_head')->nullable();
            $table->longText('about_text')->nullable();
            $table->string('events_head')->nullable();
            $table->longText('events_text')->nullable();
            $table->string('contact_head')->nullable();
            $table->longText('contact_text')->nullable();
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
        Schema::dropIfExists('configurations');
    }
};
