<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('icon', 40);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('show_in_stack')->default(true);
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('icon', 40);
            $table->unsignedInteger('price_cents');
            $table->boolean('is_monthly')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('title');
            $table->text('description');
            $table->json('bullets');
            $table->string('duration_label')->nullable();
            $table->timestamps();

            $table->unique(['service_id', 'locale']);
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            // web | app | ecommerce | data
            $table->string('category', 20);
            // dashboard | shop | calendar | landing | api | portal
            $table->string('media_key', 40);
            $table->unsignedSmallInteger('year');
            $table->unsignedSmallInteger('sort_order')->default(0);
            // draft | published
            $table->string('status', 20)->default('published');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'sort_order']);
        });

        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('badge');
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->string('media_alt')->nullable();
            $table->timestamps();

            $table->unique(['project_id', 'locale']);
        });

        Schema::create('project_technology', function (Blueprint $table) {
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('sort_order')->default(0);

            $table->primary(['project_id', 'technology_id']);
        });

        Schema::create('commitments', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('commitment_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commitment_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->string('label');
            $table->string('title');
            $table->string('subtitle');
            $table->text('body');
            $table->timestamps();

            $table->unique(['commitment_id', 'locale']);
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('commitment_translations');
        Schema::dropIfExists('commitments');
        Schema::dropIfExists('project_technology');
        Schema::dropIfExists('project_translations');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('service_translations');
        Schema::dropIfExists('services');
        Schema::dropIfExists('technologies');
    }
};
