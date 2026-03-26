<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contact_id')->nullable()->constrained()->nullOnDelete();

            $table->string('title');
            $table->enum('pricing_type', [
                'hourly',
                'monthly',
                'fixed_project',
                'retainer'
            ]);

            $table->decimal('amount', 14, 2);
            $table->string('currency', 10)->default('USD');

            $table->unsignedInteger('estimated_hours')->nullable();

            $table->date('sent_at')->nullable();
            $table->date('valid_until')->nullable();

            $table->enum('status', [
                'draft',
                'sent',
                'viewed',
                'negotiating',
                'accepted',
                'rejected',
                'expired'
            ])->default('draft');

            $table->text('scope_summary')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index('company_id');
            $table->index('status');
            $table->index('pricing_type');
            $table->index('sent_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};