<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contact_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('interaction_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('quotation_id')->nullable()->constrained()->nullOnDelete();

            $table->date('due_date');
            $table->enum('status', [
                'pending',
                'done',
                'skipped',
                'cancelled'
            ])->default('pending');

            $table->enum('reason', [
                'initial_follow_up',
                'proposal_follow_up',
                'no_response',
                'meeting_reminder',
                'negotiation',
                'manual',
                'other'
            ])->default('manual');

            $table->text('notes')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->index('company_id');
            $table->index('contact_id');
            $table->index('due_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};