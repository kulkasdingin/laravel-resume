<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            // $table->uuid("uuid");
            $table->timestamps();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("profesion");
            $table->text("photo")->nullable();
            $table->text("address")->nullable();
            $table->string("email")->unique();
            $table->date("birth_date")->nullable();
            $table->string("phone")->nullable();
            $table->boolean("gender")->nullable()->comment("0 = male, 1 = female");
            $table->foreignId("user_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
