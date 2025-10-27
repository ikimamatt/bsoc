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
        Schema::create('hse_reports', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->date('project_start_date');
            $table->integer('days_completed');
            $table->integer('total_manhours');
            $table->integer('total_manhours_with_lti');
            $table->integer('persons_inducted');
            $table->integer('training_conducted');
            $table->integer('training_hours');
            $table->integer('hse_observations');
            $table->integer('hse_meeting');
            $table->integer('permit_to_work');
            $table->integer('knowledge_share');
            $table->integer('leadership_tour');
            $table->integer('audit');
            $table->integer('accident_incident');
            $table->decimal('trcf', 8, 2);
            $table->decimal('ltifr', 8, 2);
            $table->text('scope_of_works')->nullable();
            
            // JSON columns for complex data
            $table->json('leading_indicators')->nullable();
            $table->json('lagging_indicators')->nullable();
            $table->json('deliverables_status')->nullable();
            $table->json('permit_to_work_stats')->nullable();
            $table->json('hse_achievement')->nullable();
            $table->json('additional_hse_data')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hse_reports');
    }
};
