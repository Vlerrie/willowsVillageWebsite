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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 255);
            $table->text('body');
            $table->timestamp('published', 0)->nullable();
            $table->integer('created_by', false)->nullable();
            $table->integer('deleted_by', false)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['published', 'deleted_at']);
            $table->index(['published']);
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
        Schema::dropIfExists('news');
    }
};
