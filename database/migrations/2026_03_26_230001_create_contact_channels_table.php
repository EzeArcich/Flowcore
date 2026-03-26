<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_channels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('contact_id')->nullable()->constrained()->nullOnDelete();

            $table->enum('channel_type', [
                'email',
                'linkedin',
                'whatsapp',
                'phone',
                'website_form',
                'other'
            ]);

            $table->string('value'); // email, url, phone, etc
            $table->string('label')->nullable(); // "HR email", "CEO LinkedIn", etc

            $table->boolean('is_verified')->default(false);
            $table->boolean('is_used')->default(false);

            $table->timestamps();

            $table->index('channel_type');
            $table->index('is_used');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_channels');
    }
};