<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchableMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchable_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
             $table->unsignedBigInteger('menu_id')->nullable();
            $table->foreign('menu_id')->references('id')->on('searchable_menus')->onDelete('cascade');
            $table->integer('order')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->integer('is_visible')->default(1);
            $table->string('updated_by')->nullable();
            $table->integer('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('searchble_menus');
        Schema::table('searchable_menus', function(Blueprint $table)
        {
            $table->dropForeign('menu_id'); 
        });
    }
}
