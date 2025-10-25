<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Page HSE Monthly Executive Report</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #e8e8e8;
            min-height: 100vh;
        }

        .header {
            background: #1e3a8a;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            font-weight: 600;
        }

        .header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .header .month {
            font-size: 1.2rem;
            font-weight: 500;
        }

        .main-container {
            margin-top: 70px;
            display: flex;
            min-height: calc(100vh - 70px);
        }

        /* Left Sidebar */
        .left-sidebar {
            width: 220px;
            background: #1e3a8a;
            color: white;
            padding: 0;
            position: relative;
            display: flex;
        }

        .left-sidebar-data {
            width: 180px;
            background: #1e3a8a;
            padding: 0;
        }

        .sidebar-item {
            display: flex;
            flex-direction: column;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-label {
            background: #d0d0d0;
            color: #333;
            padding: 0.4rem 0.6rem;
            font-size: 0.7rem;
            font-weight: 500;
            border-left: 3px solid #999;
        }

        .sidebar-label.blue {
            background: #0066cc;
            color: white;
            font-weight: 600;
            border-left-color: #004499;
        }

        .sidebar-value {
            background: #ffffff;
            color: #333;
            padding: 0.4rem 0.6rem;
            font-size: 0.7rem;
            font-weight: 500;
            border-left: 3px solid #999;
            border: 1px solid #d0d0d0;
        }

        .sidebar-value.dark {
            background: #2c3e50;
            color: white;
            border: none;
            border-left: 3px solid #1a252f;
        }

        .left-sidebar-header {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #34495e;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 1rem 0.5rem;
            border-right: 3px solid #1a252f;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 2rem;
        }


        /* Section Styles */
        .section {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .section-header {
            background: #f8fafc;
            padding: 0.5rem;
            border-bottom: 1px solid #e2e8f0;
            font-weight: 600;
            font-size: 0.8rem;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            float: left;
            margin-right: 0.5rem;
            border-right: 2px solid #e2e8f0;
            border-radius: 4px 0 0 4px;
        }

        .section-content {
            padding: 1rem;
            margin-left: 35px;
            background: white;
            border-radius: 0 4px 4px 0;
        }

        /* Data Boxes */
        .data-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 1.5rem;
            margin-bottom: 0.75rem;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 0.8rem;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }

        .data-box.small {
            min-height: 60px;
            padding: 1rem;
        }

        .data-box.large {
            min-height: 100px;
            padding: 2rem;
        }

        /* Tables */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            font-size: 0.75rem;
        }

        .table th,
        .table td {
            border: 1px solid #d1d5db;
            padding: 0.25rem 0.5rem;
            text-align: left;
            font-size: 0.7rem;
        }

        .table th {
            background-color: #f8fafc;
            font-weight: 600;
            font-size: 0.65rem;
        }

        /* Observation Grid */
        .observation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .observation-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
            text-align: center;
            min-height: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .observation-item.white {
            background-color: #ffffff;
            border: 1px solid #d1d5db;
        }

        .observation-item.green {
            background-color: #dcfce7;
            border: 1px solid #16a34a;
        }

        .observation-item.red {
            background-color: #fee2e2;
            border: 1px solid #dc2626;
        }

        .observation-label {
            font-size: 0.6rem;
            color: #6b7280;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }

        .observation-value {
            font-size: 1rem;
            font-weight: 700;
            color: #1f2937;
        }

        .observation-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        /* Achievement Grid */
        .achievement-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .achievement-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.75rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            font-size: 0.7rem;
            min-height: 60px;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .achievement-icon {
            width: 24px;
            height: 24px;
            background: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            flex-shrink: 0;
            margin-top: 0.125rem;
            border-radius: 4px;
            font-weight: bold;
        }

        /* Photo Grid */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
            margin-top: 0.75rem;
        }

        .photo-box {
            aspect-ratio: 1;
            background: #f3f4f6;
            border: 1px solid #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 0.6rem;
            min-height: 50px;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        /* Right Sidebar Content */
        .right-sidebar-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            background: rgba(255,255,255,0.1);
            border-radius: 0.25rem;
            font-size: 0.7rem;
            line-height: 1.3;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar-button {
            width: 8px;
            height: 6px;
            background: #60a5fa;
            border-radius: 0.125rem;
            flex-shrink: 0;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .left-sidebar {
                display: none;
            }
            .main-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>One Page HSE Monthly Executive Report</h1>
        <div class="month">Month: {{ $hseData['month'] ?? 'Oct-25' }}</div>
    </div>

    <div class="main-container">
        <!-- Left Sidebar -->
        <div class="left-sidebar">
            <div class="left-sidebar-data">
                <div class="sidebar-item">
                    <div class="sidebar-label">Month</div>
                    <div class="sidebar-value">{{ $hseData['month'] ?? 'Oct-25' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-label blue">Project Start Date</div>
                    <div class="sidebar-value">{{ $hseData['project_start_date'] ?? '2024-01-15' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-label blue">Days Completed</div>
                    <div class="sidebar-value dark">{{ $hseData['days_completed'] ?? '285' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-label blue">ITD</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Total Manhours</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ number_format($hseData['total_manhours'] ?? 125000) }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Total Manhours with LTI</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ number_format($hseData['total_manhours_with_lti'] ?? 125000) }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Persons Inducted</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['persons_inducted'] ?? '450' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Training Conducted</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['training_conducted'] ?? '25' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Training Hrs</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['training_hours'] ?? '180' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># HSE Observations</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['hse_observations'] ?? '1250' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># HSE Meeting</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['hse_meeting'] ?? '12' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Permit to Work</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['permit_to_work'] ?? '85' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Knowledge Share</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['knowledge_share'] ?? '8' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Leadership Tour</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['leadership_tour'] ?? '6' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Audit</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['audit'] ?? '3' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># Accident/Incident</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['accident_incident'] ?? '0' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># TRCF</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['trcf'] ?? '0.0' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark"># LTIFR</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">{{ $hseData['ltifr'] ?? '0.0' }}</div>
                </div>
                
                <div class="sidebar-item">
                    <div class="sidebar-value dark">Scope of Works</div>
                </div>
                
                
            </div>
            
            <div class="left-sidebar-header">Project HSE Statistics Report</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Column 1 -->
            <div>
                <div class="section">
                    <div class="section-header">Project HSE Statistics Report</div>
                    <div class="section-content">
                        <!-- HSE Leading Indicators -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">HSE Leading Indicators</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th>YTD</th>
                                        <th>ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hseData['leading_indicators'] ?? [] as $indicator)
                                    <tr>
                                        <td>{{ $indicator['description'] }}</td>
                                        <td>{{ $indicator['oct25'] }}</td>
                                        <td>{{ $indicator['ytd'] }}</td>
                                        <td>{{ $indicator['itd'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Description Section 1 -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">Description</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th>YTD</th>
                                        <th>ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#Critical Risk Workshop</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#Awards & Reward</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#Monthly Inspections (Reported)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Description - Training (No.) -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">Description - Training (No.)</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th>YTD</th>
                                        <th>ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#HSE Induction (No.)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#HSE Induction Attendence</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#HSE Training - TBT</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#Daily Pre-Task Briefing</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#Activity Based Training</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>#External training - 3rd Party</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- HSE Lagging Indicators -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">HSE Lagging Indicators</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th>YTD</th>
                                        <th>ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hseData['lagging_indicators'] ?? [] as $lagging)
                                    <tr>
                                        <td>{{ $lagging['description'] }}</td>
                                        <td>{{ $lagging['oct25'] }}</td>
                                        <td>{{ $lagging['ytd'] }}</td>
                                        <td>{{ $lagging['itd'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div>
                <div class="section">
                    <div class="section-header">HSE Statistics</div>
                    <div class="section-content">
                        <!-- Manhours without LTI -->
                        <div class="data-box large">
                            <div style="text-align: center;">
                                <div style="font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">Manhours without LTI</div>
                                <div style="font-size: 1.5rem; font-weight: 700; color: #3b82f6;">{{ number_format($hseData['total_manhours_with_lti'] ?? 125000) }}</div>
                            </div>
                        </div>

                        <!-- HSE Training Statistics -->
                        <div class="data-box large">
                            <div style="text-align: center;">
                                <div style="font-size: 0.875rem; font-weight: 600; margin-bottom: 0.5rem;">HSE Training Statistics (No. of Sessions)</div>
                                <div style="font-size: 1.5rem; font-weight: 700; color: #10b981;">{{ $hseData['training_conducted'] ?? '25' }}</div>
                            </div>
                        </div>

                        <!-- HSE Training Hours -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">HSE Training Hours</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #10b981;">{{ $hseData['training_hours'] ?? '180' }}</div>
                            </div>
                        </div>

                        <!-- Near Miss Report -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Near Miss Report</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #f59e0b;">0</div>
                            </div>
                        </div>

                        <!-- TRCF -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Total Reportable Case Frequency (TRCF)</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #ef4444;">{{ $hseData['trcf'] ?? '0.0' }}</div>
                            </div>
                        </div>

                        <!-- Accident/Incident Statistics -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Accident/Incident (A/I) Statistics</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #ef4444;">{{ $hseData['accident_incident'] ?? '0' }}</div>
                            </div>
                        </div>

                        <!-- HSE Observation -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">HSE Observation</h3>
                            <div class="observation-grid">
                                <div class="observation-item white">
                                    <div class="observation-label">Cumulative</div>
                                    <div class="observation-value">{{ $hseData['hse_observations'] ?? '1250' }}</div>
                                </div>
                                <div class="observation-item green">
                                    <div class="observation-label">Positive</div>
                                    <div class="observation-value">850</div>
                                </div>
                                <div class="observation-item red">
                                    <div class="observation-label">Negative</div>
                                    <div class="observation-value">400</div>
                                </div>
                            </div>
                            
                            <div class="observation-grid-4">
                                <div class="observation-item white">
                                    <div class="observation-label">Observation</div>
                                    <div class="observation-value">1250</div>
                                </div>
                                <div class="observation-item white">
                                    <div class="observation-label">Critical</div>
                                    <div class="observation-value">25</div>
                                </div>
                                <div class="observation-item white">
                                    <div class="observation-label">Unsafe</div>
                                    <div class="observation-value">15</div>
                                </div>
                                <div class="observation-item white">
                                    <div class="observation-label">Act</div>
                                    <div class="observation-value">10</div>
                                </div>
                            </div>
                        </div>

                        <!-- LTIFR -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Lost Time Incident Frequency Rate (LTIFR)</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #ef4444;">{{ $hseData['ltifr'] ?? '0.0' }}</div>
                            </div>
                        </div>

                        <!-- HSE Audit -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">HSE Audit</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #3b82f6;">{{ $hseData['audit'] ?? '3' }}</div>
                            </div>
                        </div>

                        <!-- Reward Recognition -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">Reward Recognition (No. of Worker)</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #10b981;">45</div>
                            </div>
                        </div>

                        <!-- HSE Inspection -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem;">HSE Inspection</div>
                                <div style="font-size: 1.25rem; font-weight: 700; color: #3b82f6;">12</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 3 -->
            <div>
                <div class="section">
                    <div class="section-header">HSE Deliverables</div>
                    <div class="section-content">
                        <!-- HSE Deliverables Status -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">HSE Deliverables Status</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Rev.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hseData['deliverables_status'] ?? [] as $deliverable)
                                    <tr>
                                        <td>{{ $deliverable['description'] }}</td>
                                        <td>{{ $deliverable['status'] }}</td>
                                        <td>{{ $deliverable['rev'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Permit To Work Statistics -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">Permit To Work Statistics</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th>YTD</th>
                                        <th>ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hseData['permit_to_work_stats'] ?? [] as $permit)
                                    <tr>
                                        <td>{{ $permit['description'] }}</td>
                                        <td>{{ $permit['oct25'] }}</td>
                                        <td>{{ $permit['ytd'] }}</td>
                                        <td>{{ $permit['itd'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- HSE Achievement -->
                        <div style="margin-bottom: 1.5rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">HSE Achievement</h3>
                            <div class="achievement-grid">
                                @foreach($hseAchievement ?? [] as $achievement)
                                <div class="achievement-item">
                                    <div class="achievement-icon">{{ strtoupper(substr($achievement['icon'], 0, 1)) }}</div>
                                    <div style="flex: 1;">
                                        <div style="font-size: 0.75rem; color: #6b7280; margin-bottom: 0.25rem;">{{ $achievement['label'] }}</div>
                                        <div style="font-size: 0.75rem;">
                                            <div>{{ $hseData['month'] ?? 'Oct-25' }}: {{ $achievement['oct25'] }}</div>
                                            <div>ITD: {{ $achievement['itd'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Additional HSE Data -->
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">HSE</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th>YTD</th>
                                        <th>ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hseData['additional_hse_data'] ?? [] as $data)
                                    <tr>
                                        <td>{{ $data['description'] }}</td>
                                        <td>{{ $data['oct25'] }}</td>
                                        <td>{{ $data['ytd'] }}</td>
                                        <td>{{ $data['itd'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 4 - Meeting & Workshop and Photographs -->
            <div>
                <!-- Meeting & Workshop Section -->
                <div class="section" style="margin-bottom: 2rem;">
                    <div class="section-header">Meeting & Workshop</div>
                    <div class="section-content">
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">Meeting & Workshop</h3>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 0.75rem; border-radius: 4px; display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="width: 8px; height: 8px; background: #60a5fa; border-radius: 2px; flex-shrink: 0;"></span>
                                    <span style="font-size: 0.75rem;">Knowledge Share</span>
                                </div>
                                <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 0.75rem; border-radius: 4px; display: flex; align-items: center; gap: 0.5rem;">
                                    <span style="width: 8px; height: 8px; background: #60a5fa; border-radius: 2px; flex-shrink: 0;"></span>
                                    <span style="font-size: 0.75rem;">Leadership Tour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photographs Section -->
                <div class="section">
                    <div class="section-header">Photographs</div>
                    <div class="section-content">
                        <div style="margin-bottom: 1rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 600; margin-bottom: 0.5rem; background: #6b8cae; color: white; padding: 0.4rem 0.5rem; border-radius: 2px;">Photographs</h3>
                            <div class="photo-grid">
                                <div class="photo-box">Photo 1</div>
                                <div class="photo-box">Photo 2</div>
                                <div class="photo-box">Photo 3</div>
                                <div class="photo-box">Photo 4</div>
                                <div class="photo-box">Photo 5</div>
                                <div class="photo-box">Photo 6</div>
                                <div class="photo-box">Photo 7</div>
                                <div class="photo-box">Photo 8</div>
                                <div class="photo-box">Photo 9</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
