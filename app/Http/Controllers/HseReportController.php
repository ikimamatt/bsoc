<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HseReport;

class HseReportController extends Controller
{
    public function index()
    {
        // Sample data for the HSE report
        $hseData = [
            'month' => 'Oct-25',
            'project_start_date' => '2024-01-15',
            'days_completed' => 285,
            'itd' => 'Inception to Date',
            'total_manhours' => 125000,
            'total_manhours_with_lti' => 125000,
            'persons_inducted' => 450,
            'training_conducted' => 25,
            'training_hours' => 180,
            'hse_observations' => 1250,
            'hse_meeting' => 12,
            'permit_to_work' => 85,
            'knowledge_share' => 8,
            'leadership_tour' => 6,
            'audit' => 3,
            'accident_incident' => 0,
            'trcf' => 0.0,
            'ltifr' => 0.0,
            'scope_of_works' => 'Construction & Installation',
            'leading_indicators' => [
                ['description' => '#Project HSE SLT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Project HSE Meeting & Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Project HSE Coordination Meeting', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Near Miss Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
            ],
            'training_data' => [
                ['description' => '#Critical Risk Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Awards & Reward', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Monthly Inspections (Reported)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#HSE Induction (No.)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#HSE Induction Attendance', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#HSE Training - TBT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Daily Pre-Task Briefing', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#Activity Based Training', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => '#External training - 3rd Party', 'oct25' => '', 'ytd' => '', 'itd' => '']
            ],
            'lagging_indicators' => [
                ['description' => 'Fatalities', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Permanent Total Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Permanent Partial Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Lost Workday Case (Injuries)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Lost Workday Case (Occupational illness)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Restricted Workday Case', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Medical Treatment Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Serious Dangerous Occurrences', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Equipment/Property Damage Incidents', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'First Aid Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Near Misses', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Environmental Incident', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Non-Compliance Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Disciplinary Actions', 'oct25' => '', 'ytd' => '', 'itd' => '']
            ],
            'deliverables_status' => [
                ['description' => 'HSE Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Project Emergency Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Lifting Operation Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Fire Protection and Prevention Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Project Security Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Traffic Management and Logistics Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Welfare Management Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Electrical Safety Management Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Environmental Management Plan', 'status' => '', 'rev' => ''],
                ['description' => 'Working at Height Plan', 'status' => '', 'rev' => '']
            ],
            'permit_to_work_stats' => [
                ['description' => 'Lifting Operation', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Breaking Ground', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Confined Space', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Working at Height', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Hot Works', 'oct25' => '', 'ytd' => '', 'itd' => '']
            ],
            'additional_hse_data' => [
                ['description' => 'HSE Innovations', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'HSE Campaign', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'Workers Feedback', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                ['description' => 'HSE Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
            ]
        ];

        // HSE Achievement data
        $hseAchievement = [
            ['icon' => 'crane', 'label' => 'Lifting (Ton)', 'oct25' => '', 'itd' => ''],
            ['icon' => 'excavator', 'label' => 'Excavation (M³)', 'oct25' => '', 'itd' => ''],
            ['icon' => 'concrete', 'label' => 'Concrete (M³)', 'oct25' => '', 'itd' => ''],
            ['icon' => 'dump_truck', 'label' => 'Filling (M²)', 'oct25' => '', 'itd' => ''],
            ['icon' => 'vehicle', 'label' => 'Vehicle (Km)', 'oct25' => '', 'itd' => '']
        ];

                return view('hse-report', compact(
                    'hseData',
                    'hseAchievement'
                ));
            }

            public function original()
            {
                // Sample data for the HSE report
                $hseData = [
                    'month' => 'Oct-25',
                    'project_start_date' => '2024-01-15',
                    'days_completed' => 285,
                    'itd' => 'Inception to Date',
                    'total_manhours' => 125000,
                    'total_manhours_with_lti' => 125000,
                    'persons_inducted' => 450,
                    'training_conducted' => 25,
                    'training_hours' => 180,
                    'hse_observations' => 1250,
                    'hse_meeting' => 12,
                    'permit_to_work' => 85,
                    'knowledge_share' => 8,
                    'leadership_tour' => 6,
                    'audit' => 3,
                    'accident_incident' => 0,
                    'trcf' => 0.0,
                    'ltifr' => 0.0,
                    'scope_of_works' => 'Construction & Installation',
                    'leading_indicators' => [
                        ['description' => '#Project HSE SLT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Project HSE Meeting & Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Project HSE Coordination Meeting', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Near Miss Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'training_data' => [
                        ['description' => '#Critical Risk Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Awards & Reward', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Monthly Inspections (Reported)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Induction (No.)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Induction Attendance', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Training - TBT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Daily Pre-Task Briefing', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Activity Based Training', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#External training - 3rd Party', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'lagging_indicators' => [
                        ['description' => 'Fatalities', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Permanent Total Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Permanent Partial Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Lost Workday Case (Injuries)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Lost Workday Case (Occupational illness)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Restricted Workday Case', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Medical Treatment Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Serious Dangerous Occurrences', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Equipment/Property Damage Incidents', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'First Aid Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Near Misses', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Environmental Incident', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Non-Compliance Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Disciplinary Actions', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'deliverables_status' => [
                        ['description' => 'HSE Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Project Emergency Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Lifting Operation Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Fire Protection and Prevention Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Project Security Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Traffic Management and Logistics Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Welfare Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Electrical Safety Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Environmental Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Working at Height Plan', 'status' => '', 'rev' => '']
                    ],
                    'permit_to_work_stats' => [
                        ['description' => 'Lifting Operation', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Breaking Ground', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Confined Space', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Working at Height', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Hot Works', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'additional_hse_data' => [
                        ['description' => 'HSE Innovations', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'HSE Campaign', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Workers Feedback', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'HSE Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ]
                ];

                // HSE Achievement data
                $hseAchievement = [
                    ['icon' => 'crane', 'label' => 'Lifting (Ton)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'excavator', 'label' => 'Excavation (M³)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'concrete', 'label' => 'Concrete (M³)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'dump_truck', 'label' => 'Filling (M²)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'vehicle', 'label' => 'Vehicle (Km)', 'oct25' => '', 'itd' => '']
                ];

                return view('hse-report-original', compact(
                    'hseData',
                    'hseAchievement'
                ));
            }

            public function exact()
            {
                // Sample data for the HSE report
                $hseData = [
                    'month' => 'Oct-25',
                    'project_start_date' => '2024-01-15',
                    'days_completed' => 285,
                    'itd' => 'Inception to Date',
                    'total_manhours' => 125000,
                    'total_manhours_with_lti' => 125000,
                    'persons_inducted' => 450,
                    'training_conducted' => 25,
                    'training_hours' => 180,
                    'hse_observations' => 1250,
                    'hse_meeting' => 12,
                    'permit_to_work' => 85,
                    'knowledge_share' => 8,
                    'leadership_tour' => 6,
                    'audit' => 3,
                    'accident_incident' => 0,
                    'trcf' => 0.0,
                    'ltifr' => 0.0,
                    'scope_of_works' => 'Construction & Installation',
                    'leading_indicators' => [
                        ['description' => '#Project HSE SLT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Project HSE Meeting & Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Project HSE Coordination Meeting', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Near Miss Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'training_data' => [
                        ['description' => '#Critical Risk Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Awards & Reward', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Monthly Inspections (Reported)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Induction (No.)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Induction Attendance', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Training - TBT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Daily Pre-Task Briefing', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Activity Based Training', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#External training - 3rd Party', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'lagging_indicators' => [
                        ['description' => 'Fatalities', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Permanent Total Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Permanent Partial Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Lost Workday Case (Injuries)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Lost Workday Case (Occupational illness)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Restricted Workday Case', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Medical Treatment Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Serious Dangerous Occurrences', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Equipment/Property Damage Incidents', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'First Aid Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Near Misses', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Environmental Incident', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Non-Compliance Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Disciplinary Actions', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'deliverables_status' => [
                        ['description' => 'HSE Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Project Emergency Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Lifting Operation Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Fire Protection and Prevention Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Project Security Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Traffic Management and Logistics Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Welfare Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Electrical Safety Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Environmental Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Working at Height Plan', 'status' => '', 'rev' => '']
                    ],
                    'permit_to_work_stats' => [
                        ['description' => 'Lifting Operation', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Breaking Ground', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Confined Space', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Working at Height', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Hot Works', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'additional_hse_data' => [
                        ['description' => 'HSE Innovations', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'HSE Campaign', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Workers Feedback', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'HSE Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ]
                ];

                // HSE Achievement data
                $hseAchievement = [
                    ['icon' => 'crane', 'label' => 'Lifting (Ton)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'excavator', 'label' => 'Excavation (M³)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'concrete', 'label' => 'Concrete (M³)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'dump_truck', 'label' => 'Filling (M²)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'vehicle', 'label' => 'Vehicle (Km)', 'oct25' => '', 'itd' => '']
                ];

                return view('hse-report-exact', compact(
                    'hseData',
                    'hseAchievement'
                ));
            }

            public function exactMatch()
            {
                // Sample data for the HSE report
                $hseData = [
                    'month' => 'Oct-25',
                    'project_start_date' => '2024-01-15',
                    'days_completed' => 285,
                    'itd' => 'Inception to Date',
                    'total_manhours' => 125000,
                    'total_manhours_with_lti' => 125000,
                    'persons_inducted' => 450,
                    'training_conducted' => 25,
                    'training_hours' => 180,
                    'hse_observations' => 1250,
                    'hse_meeting' => 12,
                    'permit_to_work' => 85,
                    'knowledge_share' => 8,
                    'leadership_tour' => 6,
                    'audit' => 3,
                    'accident_incident' => 0,
                    'trcf' => 0.0,
                    'ltifr' => 0.0,
                    'scope_of_works' => 'Construction & Installation',
                    'leading_indicators' => [
                        ['description' => '#Project HSE SLT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Project HSE Meeting & Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Project HSE Coordination Meeting', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Near Miss Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'training_data' => [
                        ['description' => '#Critical Risk Workshop', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Awards & Reward', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Monthly Inspections (Reported)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Induction (No.)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Induction Attendance', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#HSE Training - TBT', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Daily Pre-Task Briefing', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#Activity Based Training', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => '#External training - 3rd Party', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'lagging_indicators' => [
                        ['description' => 'Fatalities', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Permanent Total Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Permanent Partial Disability', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Lost Workday Case (Injuries)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Lost Workday Case (Occupational illness)', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Restricted Workday Case', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Medical Treatment Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Serious Dangerous Occurrences', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Equipment/Property Damage Incidents', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'First Aid Cases', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Near Misses', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Environmental Incident', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Non-Compliance Report', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Disciplinary Actions', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'deliverables_status' => [
                        ['description' => 'HSE Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Project Emergency Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Lifting Operation Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Fire Protection and Prevention Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Project Security Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Traffic Management and Logistics Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Welfare Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Electrical Safety Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Environmental Management Plan', 'status' => '', 'rev' => ''],
                        ['description' => 'Working at Height Plan', 'status' => '', 'rev' => '']
                    ],
                    'permit_to_work_stats' => [
                        ['description' => 'Lifting Operation', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Breaking Ground', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Confined Space', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Working at Height', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Hot Works', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ],
                    'additional_hse_data' => [
                        ['description' => 'HSE Innovations', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'HSE Campaign', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'Workers Feedback', 'oct25' => '', 'ytd' => '', 'itd' => ''],
                        ['description' => 'HSE Emergency Drill', 'oct25' => '', 'ytd' => '', 'itd' => '']
                    ]
                ];

                // HSE Achievement data
                $hseAchievement = [
                    ['icon' => 'crane', 'label' => 'Lifting (Ton)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'excavator', 'label' => 'Excavation (M³)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'concrete', 'label' => 'Concrete (M³)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'dump_truck', 'label' => 'Filling (M²)', 'oct25' => '', 'itd' => ''],
                    ['icon' => 'vehicle', 'label' => 'Vehicle (Km)', 'oct25' => '', 'itd' => '']
                ];

                // Get latest report from database or use sample data
                $latestReport = HseReport::latest()->first();
                
                if ($latestReport) {
                    $hseData = [
                        'month' => $latestReport->month,
                        'project_start_date' => $latestReport->project_start_date->format('Y-m-d'),
                        'days_completed' => $latestReport->days_completed,
                        'total_manhours' => $latestReport->total_manhours,
                        'total_manhours_with_lti' => $latestReport->total_manhours_with_lti,
                        'persons_inducted' => $latestReport->persons_inducted,
                        'training_conducted' => $latestReport->training_conducted,
                        'training_hours' => $latestReport->training_hours,
                        'hse_observations' => $latestReport->hse_observations,
                        'hse_meeting' => $latestReport->hse_meeting,
                        'permit_to_work' => $latestReport->permit_to_work,
                        'knowledge_share' => $latestReport->knowledge_share,
                        'leadership_tour' => $latestReport->leadership_tour,
                        'audit' => $latestReport->audit,
                        'accident_incident' => $latestReport->accident_incident,
                        'trcf' => $latestReport->trcf,
                        'ltifr' => $latestReport->ltifr,
                        'scope_of_works' => $latestReport->scope_of_works,
                        'leading_indicators' => $latestReport->leading_indicators ?? [],
                        'lagging_indicators' => $latestReport->lagging_indicators ?? [],
                        'deliverables_status' => $latestReport->deliverables_status ?? [],
                        'permit_to_work_stats' => $latestReport->permit_to_work_stats ?? [],
                        'additional_hse_data' => $latestReport->additional_hse_data ?? [],
                    ];
                    
                    $hseAchievement = $latestReport->hse_achievement ?? [];
                }

                return view('hse-report-exact-match', compact(
                    'hseData',
                    'hseAchievement'
                ));
            }

            public function create()
            {
                // Generate random dummy data that changes on each refresh
                $months = ['Jan-25', 'Feb-25', 'Mar-25', 'Apr-25', 'May-25', 'Jun-25', 'Jul-25', 'Aug-25', 'Sep-25', 'Oct-25', 'Nov-25', 'Dec-25'];
                $randomMonth = $months[array_rand($months)];
                
                return view('hse-form', compact('randomMonth'));
            }

            public function store(Request $request)
            {
                $validated = $request->validate([
                    'month' => 'required|string',
                    'project_start_date' => 'required|date',
                    'days_completed' => 'required|integer',
                    'total_manhours' => 'required|integer',
                    'total_manhours_with_lti' => 'required|integer',
                    'persons_inducted' => 'required|integer',
                    'training_conducted' => 'required|integer',
                    'training_hours' => 'required|integer',
                    'hse_observations' => 'required|integer',
                    'hse_meeting' => 'required|integer',
                    'permit_to_work' => 'required|integer',
                    'knowledge_share' => 'required|integer',
                    'leadership_tour' => 'required|integer',
                    'audit' => 'required|integer',
                    'accident_incident' => 'required|integer',
                    'trcf' => 'required|numeric',
                    'ltifr' => 'required|numeric',
                    'scope_of_works' => 'nullable|string',
                ]);

                // Process JSON fields
                $validated['leading_indicators'] = json_decode($request->leading_indicators, true);
                $validated['lagging_indicators'] = json_decode($request->lagging_indicators, true);
                $validated['deliverables_status'] = json_decode($request->deliverables_status, true);
                $validated['permit_to_work_stats'] = json_decode($request->permit_to_work_stats, true);
                $validated['hse_achievement'] = json_decode($request->hse_achievement, true);
                $validated['additional_hse_data'] = json_decode($request->additional_hse_data, true);

                HseReport::create($validated);

                return redirect('/')->with('success', 'HSE Report saved successfully!');
            }

            public function monitoring()
            {
                return view('hse-monitoring-dashboard');
            }

            public function scorecard()
            {
                return view('performance-scorecard');
            }

            public function manHours()
            {
                return view('man-hours-analysis');
            }
        }
