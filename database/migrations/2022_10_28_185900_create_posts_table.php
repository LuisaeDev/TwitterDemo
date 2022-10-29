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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->char('type', '3');
            $table->string('ref')->nullable()->default(null);
            $table->string('message', 280);
            $table->unsignedInteger('n_comments')->default(0);
            $table->unsignedInteger('n_likes')->default(0);

            // Metadata
            $table->timestamps();

            // Foreigns Keys
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();
            
            // Indices
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
