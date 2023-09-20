<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_settings', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('sender', 255)->nullable();
            $table->string('default', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('module_settings')->insert([
            'username' => 'developer',
            'password' => '8000',
            'sender' => '982100066381362',
            'default' => 'باتشکر از شما بزودی با شما تماس خواهیم گرفت',
            'created_at' =>now()->format('Y-m-d H:i:s'),
            'updated_at' =>now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_settings');
    }
};
