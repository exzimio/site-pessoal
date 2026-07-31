<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('email');
            $table->string('company', 160)->nullable();
            $table->string('project_type', 120)->nullable();
            $table->string('budget', 120)->nullable();
            $table->text('body');
            // new | read | replied | spam
            $table->string('status', 20)->default('new')->index();
            $table->string('locale', 5)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('rgpd_consent_at');
            $table->timestamps();
            $table->softDeletes();

            $table->index('created_at');
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
