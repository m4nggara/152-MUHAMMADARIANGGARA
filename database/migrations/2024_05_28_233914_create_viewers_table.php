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
        Schema::create('viewers', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->longText('user_agent')->nullable();
            $table->bigInteger('item_id');
            $table->string('user_admin')->nullable();
            $table->longText('previous_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewers');
    }
};
