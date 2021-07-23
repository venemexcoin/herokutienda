<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->double('btc', 100,8)->default(0.00000000);
            $table->double('eth', 100,8)->default(0.00000000);
            $table->double('vmx', 100,8)->default(0.00000000);
            $table->float('usd')->default(0,0)->comment('Moneda principal');
            $table->float('mxn')->default(0,0);
            $table->float('bss')->default(0,0);
            $table->string('avatar')->nullable();
            $table->string('utype')->default('USR')->comment('ADM for Admin and USR for or Customer');
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
        Schema::dropIfExists('users');
    }
}
