<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('contact_id')->nullable()->constrained()->nullOnDelete();

            $table->enum('direction', [
                'outbound',
                'inbound'
            ])->default('outbound');

            $table->enum('channel', [
                'email',
                'linkedin',
                'whatsapp',
                'phone',
                'meeting',
                'website_form',
                'other'
            ]);

            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->longText('response')->nullable();

            $table->timestamp('interacted_at');
            $table->boolean('requires_follow_up')->default(false);
            $table->date('follow_up_due_at')->nullable();

            $table->string('outcome')->nullable(); // no response, positive, negative, booked call
            $table->text('notes')->nullable();

            $table->timestamps();

            $table->index('company_id');
            $table->index('contact_id');
            $table->index('channel');
            $table->index('interacted_at');
            $table->index('follow_up_due_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};