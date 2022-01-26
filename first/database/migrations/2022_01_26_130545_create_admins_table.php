<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // protected $connection = '';
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->default('Default Name')->comment('EKhane Name insert krbo');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->text('bio');
            $table->integer('age');
            // $table->float('age');
            // $table->double('age');
            $table->enum('role', ['editor', 'super'])->default('super');
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
        Schema::dropIfExists('admins');
    }
}
