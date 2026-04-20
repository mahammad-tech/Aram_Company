<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function ($table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}