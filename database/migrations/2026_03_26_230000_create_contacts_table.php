<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->string('full_name');
            $table->string('role')->nullable(); // CEO, Recruiter, CTO, etc

            $table->string('email')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();

            $table->boolean('is_primary')->default(false);
            $table->boolean('is_decision_maker')->default(false);

            $table->enum('status', [
                'not_contacted',
                'contacted',
                'replied',
                'unresponsive',
                'invalid'
            ])->default('not_contacted');

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index('company_id');
            $table->index('full_name');
            $table->index('email');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};