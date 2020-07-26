<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => env('ADMIN_NAME', 'Administrador'),
            'email' => env('ADMIN_EMAIL', ''),
            'password' => bcrypt(env('ADMIN_PASSWORD', '')),
            'role' => 100,
            'active' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::delete('DELETE users WHERE email = ?', [
            env('ADMIN_EMAIL')
        ]);
    }
}
