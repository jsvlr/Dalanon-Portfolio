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
        Schema::create(table: 'categories', callback: function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'name', length: 255)->unique();
            $table->string(column: 'link', length: 255)->unique();
            $table->foreignId('icon_id')->nullable()->constrained('icons')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
