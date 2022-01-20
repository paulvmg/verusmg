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
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('terms_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->timestamps();
        });
        Schema::create('privacy_policy', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create Admin
        \App\User::create([
            'nombre'=>'admin',
            'apellido'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin123'),
            'user_role'=>'admin'
        ]);

        // Create default term of service and privacy policy
        \App\Term::create(['description'=>'']);
        \App\PrivacyPolicy::create(['description'=>'']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privacy_policy');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('terms_conditions');
        Schema::dropIfExists('requested_documents');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('files');
        Schema::dropIfExists('users');
    }
}
