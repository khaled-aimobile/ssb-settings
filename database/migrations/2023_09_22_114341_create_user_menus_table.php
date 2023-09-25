<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->foreign('menu_id')->references('id')->on('user_menus')->onDelete('cascade');
            $table->string('icon')->nullable();
            $table->integer('order')->nullable();
            $table->integer('is_icon_image')->nullable();
            $table->string('icon_image')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->integer('is_visible')->default(1);
            $table->integer('status')->default(1);
            $table->string('updated_by')->nullable();
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
        Schema::table('user_menus', function(Blueprint $table)
        {
            $table->dropForeign('menu_id'); 
        });
        Schema::dropIfExists('user_menus');

    }
}
