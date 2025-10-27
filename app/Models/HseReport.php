<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HseReport extends Model
{
    protected $fillable = [
        'month',
        'project_start_date',
        'days_completed',
        'total_manhours',
        'total_manhours_with_lti',
        'persons_inducted',
        'training_conducted',
        'training_hours',
        'hse_observations',
        'hse_meeting',
        'permit_to_work',
        'knowledge_share',
        'leadership_tour',
        'audit',
        'accident_incident',
        'trcf',
        'ltifr',
        'scope_of_works',
        'leading_indicators',
        'lagging_indicators',
        'deliverables_status',
        'permit_to_work_stats',
        'hse_achievement',
        'additional_hse_data',
    ];

    protected $casts = [
        'leading_indicators' => 'array',
        'lagging_indicators' => 'array',
        'deliverables_status' => 'array',
        'permit_to_work_stats' => 'array',
        'hse_achievement' => 'array',
        'additional_hse_data' => 'array',
        'project_start_date' => 'date',
    ];
}
