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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->date('due_date');
            $table->unsignedBigInteger('blog');
            $table->unsignedBigInteger('social_media');
            $table->unsignedBigInteger('website');
            $table->unsignedBigInteger('apps');
            $table->unsignedBigInteger('total_of_target');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('role');
            $table->string('hr_type')->nullable();
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
        Schema::dropIfExists('targets');
    }
};
