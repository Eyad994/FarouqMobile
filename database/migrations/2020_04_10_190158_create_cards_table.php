<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->text('content_description');
            $table->integer('category_id');
            $table->integer('type_id');
            $table->boolean('is_favorite')->default(0);
            $table->string('header_en')->nullable();
            $table->string('header_ar')->nullable();
            $table->string('footer_en')->nullable();
            $table->string('footer_ar')->nullable();
            $table->string('background_color')->nullable();
            $table->string('dark_background_color')->nullable();
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
        Schema::dropIfExists('cards');
    }
}
