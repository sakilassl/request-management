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
        Schema::create('request_models', function (Blueprint $table) {
            $table->id();
            $table->string('request_id');
            $table->dateTime('created_on');
            $table->string('location');
            $table->string('service');
            $table->string('status');
            $table->string('priority');
            $table->string('department');
            $table->string('requested_by');
            $table->string('assigned_to');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_models');
    }
};
