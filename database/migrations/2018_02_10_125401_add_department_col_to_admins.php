<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartmentColToAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
             $table->string('middlename')->nullable()->after('name');
             $table->string('lastname')->nullable()->after('middlename');
            
            $table->string('department')->nullable()->after('adminposition');
             $table->string('campus')->nullable()->after('department');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['department', 'campus', 'lastname', 'middlename']);
        });
    }
}
