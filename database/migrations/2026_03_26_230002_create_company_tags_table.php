<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('company_company_tag', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('company_tag_id')->constrained()->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['company_id', 'company_tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_company_tag');
        Schema::dropIfExists('company_tags');
    }
};