<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileColToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
              $table->string('middlename')->nullable()->after('name');
            $table->string('lastname')->nullable()->after('middlename');
            $table->string('birthday')->nullable()->after('lastname');
            $table->string('gender')->nullable()->after('birthday');
            $table->string('address')->nullable()->after('gender');
            $table->string('course')->nullable()->after('address');
            $table->string('nationality')->nullable()->after('course');
            $table->string('religion')->nullable()->after('nationality');
            $table->string('civil')->nullable()->after('religion');
            $table->string('employment')->nullable()->after('civil');
            $table->string('contact')->nullable()->after('employment');
            $table->string('image')->nullable()->after('contact');
            $table->string('username')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['middlename', 'lastname', 'birthday', 'gender', 'address', 'course', 'nationality', 'religion', 'civil', 'employment', 'contact', 'image', 'username' ]);
        });
    }
}
