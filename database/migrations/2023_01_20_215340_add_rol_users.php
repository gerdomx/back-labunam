<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('users', function($table) {
            $table->enum('rol', ['user', 'admin'])->default('user');
        });
    }


    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('rol');
        });
    }
};
