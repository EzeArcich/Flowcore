<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('website')->nullable();
            $table->string('industry')->nullable(); // marketing, software, ecommerce, etc
            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->unsignedInteger('company_size_min')->nullable();
            $table->unsignedInteger('company_size_max')->nullable();

            $table->text('notes')->nullable();

            $table->enum('status', [
                'prospect',
                'contacted',
                'replied',
                'meeting',
                'proposal_sent',
                'negotiation',
                'won',
                'lost',
                'archived'
            ])->default('prospect');

            $table->date('first_contact_at')->nullable();
            $table->date('last_contact_at')->nullable();
            $table->date('next_follow_up_at')->nullable();

            $table->boolean('is_priority')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('name');
            $table->index('industry');
            $table->index('status');
            $table->index('next_follow_up_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};