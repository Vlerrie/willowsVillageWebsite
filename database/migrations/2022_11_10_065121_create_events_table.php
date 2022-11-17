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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->timestamp('date');
            $table->string('address', 255);
            $table->integer('created_by', false)->nullable();
            $table->integer('deleted_by', false)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['date', 'deleted_at']);
            $table->index(['date']);
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
