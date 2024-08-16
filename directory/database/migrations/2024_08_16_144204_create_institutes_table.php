<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->string('ihe');
            $table->string('program_title');
            $table->string('level_of_degree');
            $table->string('format');
            $table->boolean('alternate_route_to_certification');
            $table->string('category_of_credentialing');
            $table->string('url_for_program');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
