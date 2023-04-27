<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->default(Str::uuid())->unique();
            $table->string('title');
            $table->text('body');
            $table->unsignedBigInteger('user_id'); // add user_id column
            $table->timestamps();
            $table->string('image')->nullable();
            $table->foreign('user_id') // add foreign key constraint
            ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
