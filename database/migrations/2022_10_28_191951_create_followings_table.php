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
        Schema::create('followings', function (Blueprint $table) {
            $table->foreignId('follower_user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();
            $table->foreignId('followed_user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();

            // Metadata
            $table->timestamps();

            // Primary Key
            $table->primary([ 'follower_user_id', 'followed_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followings');
    }
};