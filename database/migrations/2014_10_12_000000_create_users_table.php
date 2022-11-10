<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('surname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('cell', 13)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('google_login')->default(false);
            $table->string('street_number')->nullable();
            $table->string('route')->nullable();
            $table->string('sublocality')->nullable();
            $table->string('locality')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('google_address_string', 256)->nullable();
            $table->string('complex_name', 256)->nullable();
            $table->string('complex_unit', 6)->nullable();
            $table->boolean('comm_newsletter')->default(true);
            $table->boolean('comm_events')->default(true);
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['cell']);
            $table->index(['email']);
            $table->index(['email', 'comm_newsletter']);
            $table->index(['email', 'comm_events']);
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
};
