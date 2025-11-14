<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Page HSE Monthly Executive Report</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
            min-height: 100vh;
            color: #1e293b;
        }

        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 1.25rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 75px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(30, 64, 175, 0.25);
        }

        .header h1 {
            font-size: 1.625rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: -0.025em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header .month {
            font-size: 1.25rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.5rem 1.25rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .main-container {
            margin-top: 75px;
            display: flex;
            min-height: calc(100vh - 75px);
        }

        /* Left Sidebar */
        .left-sidebar {
            width: 220px;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            padding: 0;
            position: relative;
            display: flex;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .left-sidebar-data {
            width: 180px;
            background: transparent;
            padding: 0;
        }

        .sidebar-item {
            display: flex;
            flex-direction: column;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.2s ease;
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-label {
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            color: #1f2937;
            padding: 0.5rem 0.75rem;
            font-size: 0.7rem;
            font-weight: 600;
            border-left: 3px solid #9ca3af;
            letter-spacing: 0.015em;
        }

        .sidebar-label.blue {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: white;
            font-weight: 700;
            border-left-color: #1e40af;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .sidebar-value {
            background: #ffffff;
            color: #1f2937;
            padding: 0.5rem 0.75rem;
            font-size: 0.7rem;
            font-weight: 600;
            border-left: 3px solid #9ca3af;
            border: 1px solid #e5e7eb;
        }

        .sidebar-value.dark {
            background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
            color: white;
            border: none;
            border-left: 3px solid #0f172a;
            font-weight: 600;
        }

        .left-sidebar-header {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, #475569 0%, #334155 100%);
            font-weight: 700;
            font-size: 0.875rem;
            padding: 1rem 0.5rem;
            border-right: 3px solid #1e293b;
            letter-spacing: 0.025em;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2.5rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 2rem;
        }


        /* Section Styles */
        .section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .section:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .section-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 0.5rem;
            border-bottom: 1px solid #2563eb;
            font-weight: 700;
            font-size: 0.8rem;
            writing-mode: vertical-rl;
            text-orientation: mixed;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            float: left;
            margin-right: 0.5rem;
            border-right: 2px solid #2563eb;
            border-radius: 12px 0 0 12px;
            letter-spacing: 0.05em;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section-content {
            padding: 1.25rem;
            margin-left: 38px;
            background: white;
            border-radius: 0 12px 12px 0;
        }

        /* Data Boxes */
        .data-box {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            padding: 1.5rem;
            margin-bottom: 0.875rem;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            font-size: 0.8rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: all 0.3s ease;
        }

        .data-box:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
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
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 1rem;
            font-size: 0.75rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .table th,
        .table td {
            border: 1px solid #e5e7eb;
            padding: 0.5rem 0.625rem;
            text-align: left;
            font-size: 0.7rem;
        }

        .table th {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            font-weight: 700;
            font-size: 0.675rem;
            color: #1e293b;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Observation Grid */
        .observation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.875rem;
            margin-bottom: 0.875rem;
        }

        .observation-item {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px solid #e2e8f0;
            padding: 0.875rem;
            text-align: center;
            min-height: 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .observation-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .observation-item.white {
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
            border: 2px solid #d1d5db;
        }

        .observation-item.green {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 2px solid #10b981;
        }

        .observation-item.red {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 2px solid #ef4444;
        }

        .observation-label {
            font-size: 0.625rem;
            color: #64748b;
            margin-bottom: 0.375rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .observation-value {
            font-size: 1.125rem;
            font-weight: 800;
            color: #0f172a;
        }

        .observation-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.625rem;
            margin-top: 0.625rem;
        }

        /* Achievement Grid */
        .achievement-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.875rem;
            margin-bottom: 0.875rem;
        }

        .achievement-item {
            display: flex;
            align-items: flex-start;
            gap: 0.875rem;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px solid #e2e8f0;
            font-size: 0.7rem;
            min-height: 65px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .achievement-item:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            border-color: #3b82f6;
        }

        .achievement-icon {
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.875rem;
            flex-shrink: 0;
            margin-top: 0.125rem;
            border-radius: 8px;
            font-weight: 800;
            box-shadow: 0 2px 6px rgba(59, 130, 246, 0.4);
        }

        /* Photo Grid */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.875rem;
            margin-top: 0.875rem;
        }

        .photo-box {
            aspect-ratio: 1;
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border: 2px dashed #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 0.625rem;
            min-height: 50px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .photo-box:hover {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            border-color: #818cf8;
            color: #4f46e5;
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
        }

        /* Right Sidebar Content */
        .right-sidebar-item {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            padding: 0.625rem;
            margin-bottom: 0.625rem;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 8px;
            font-size: 0.7rem;
            line-height: 1.4;
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: all 0.2s ease;
        }

        .right-sidebar-item:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .sidebar-button {
            width: 10px;
            height: 8px;
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            border-radius: 3px;
            flex-shrink: 0;
            box-shadow: 0 1px 3px rgba(96, 165, 250, 0.5);
        }

        /* Add New Report Button */
        .add-report-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
            z-index: 1001;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .add-report-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(16, 185, 129, 0.5);
        }

        /* Monitoring Tool Button */
        .monitoring-btn {
            position: fixed;
            bottom: 100px;
            right: 30px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
            z-index: 1001;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .monitoring-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(59, 130, 246, 0.5);
        }

        .success-banner {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1rem 2rem;
            text-align: center;
            font-weight: 600;
            position: fixed;
            top: 75px;
            left: 0;
            right: 0;
            z-index: 1002;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
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
    <!-- Success Banner -->
    @if(session('success'))
    <div class="success-banner">
        ✅ {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    <div class="header">
        <h1>One Page HSE Monthly Executive Report</h1>
        <div class="month">Month: {{ $hseData['month'] ?? 'Oct-25' }}</div>
    </div>

    <!-- Add New Report Button -->
    <a href="{{ route('hse-report.create') }}" class="add-report-btn">
        <span style="font-size: 1.5rem;">➕</span>
        <span>Add New Report</span>
    </a>

    <!-- Monitoring Dashboard Link -->
    <a href="{{ route('hse-monitoring') }}" class="monitoring-btn">
        <span style="font-size: 1.5rem;">📊</span>
        <span>Monitoring Tool</span>
    </a>

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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE Leading Indicators</h3>
                            <div style="max-height: 600px; overflow-y: auto; border: 1px solid #e5e7eb; border-radius: 8px;">
                                <table class="table" style="margin-bottom: 0;">
                                    <thead style="position: sticky; top: 0; z-index: 10; background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);">
                                        <tr>
                                            <th style="min-width: 250px;">Description</th>
                                            <th style="min-width: 80px; text-align: center;">{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                            <th style="min-width: 80px; text-align: center;">YTD</th>
                                            <th style="min-width: 80px; text-align: center;">ITD</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hseData['leading_indicators'] ?? [] as $indicator)
                                        <tr>
                                            <td style="font-size: 0.7rem; line-height: 1.4;">{{ $indicator['description'] }}</td>
                                            <td style="text-align: center; font-weight: 600;">{{ $indicator['oct25'] ?? '' }}</td>
                                            <td style="text-align: center; font-weight: 600;">{{ $indicator['ytd'] ?? '' }}</td>
                                            <td style="text-align: center; font-weight: 600;">{{ $indicator['itd'] ?? '' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Description Section 1 -->
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">Description</h3>
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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">Description - Training (No.)</h3>
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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE Lagging Indicators</h3>
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
                                <div style="font-size: 0.875rem; font-weight: 700; margin-bottom: 0.625rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">Manhours without LTI</div>
                                <div style="font-size: 1.75rem; font-weight: 800; color: #3b82f6;">{{ number_format($hseData['total_manhours_with_lti'] ?? 125000) }}</div>
                            </div>
                        </div>

                        <!-- HSE Training Statistics -->
                        <div class="data-box large">
                            <div style="text-align: center;">
                                <div style="font-size: 0.875rem; font-weight: 700; margin-bottom: 0.625rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">HSE Training Statistics (No. of Sessions)</div>
                                <div style="font-size: 1.75rem; font-weight: 800; color: #10b981;">{{ $hseData['training_conducted'] ?? '25' }}</div>
                            </div>
                        </div>

                        <!-- HSE Training Hours -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">HSE Training Hours</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #10b981;">{{ $hseData['training_hours'] ?? '180' }}</div>
                            </div>
                        </div>

                        <!-- Near Miss Report -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">Near Miss Report</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #f59e0b;">0</div>
                            </div>
                        </div>

                        <!-- TRCF -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">Total Reportable Case Frequency (TRCF)</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #ef4444;">{{ $hseData['trcf'] ?? '0.0' }}</div>
                            </div>
                        </div>

                        <!-- Accident/Incident Statistics -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">Accident/Incident (A/I) Statistics</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #ef4444;">{{ $hseData['accident_incident'] ?? '0' }}</div>
                            </div>
                        </div>

                        <!-- HSE Observation -->
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE Observation</h3>
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
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">Lost Time Incident Frequency Rate (LTIFR)</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #ef4444;">{{ $hseData['ltifr'] ?? '0.0' }}</div>
                            </div>
                        </div>

                        <!-- HSE Audit -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">HSE Audit</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #3b82f6;">{{ $hseData['audit'] ?? '3' }}</div>
                            </div>
                        </div>

                        <!-- Reward Recognition -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">Reward Recognition (No. of Worker)</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #10b981;">45</div>
                            </div>
                        </div>

                        <!-- HSE Inspection -->
                        <div class="data-box small">
                            <div style="text-align: center;">
                                <div style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.5rem; color: #475569; text-transform: uppercase; letter-spacing: 0.025em;">HSE Inspection</div>
                                <div style="font-size: 1.375rem; font-weight: 800; color: #3b82f6;">12</div>
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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE Deliverables Status</h3>
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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">Permit To Work Statistics</h3>
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
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE Achievement</h3>
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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE</h3>
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
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">Meeting & Workshop</h3>
                            <div style="display: flex; flex-direction: column; gap: 0.625rem;">
                                <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border: 2px solid #e2e8f0; padding: 0.875rem; border-radius: 10px; display: flex; align-items: center; gap: 0.625rem; transition: all 0.3s ease;">
                                    <span style="width: 10px; height: 10px; background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border-radius: 3px; flex-shrink: 0; box-shadow: 0 2px 4px rgba(96, 165, 250, 0.4);"></span>
                                    <span style="font-size: 0.75rem; font-weight: 600;">Knowledge Share</span>
                                </div>
                                <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border: 2px solid #e2e8f0; padding: 0.875rem; border-radius: 10px; display: flex; align-items: center; gap: 0.625rem; transition: all 0.3s ease;">
                                    <span style="width: 10px; height: 10px; background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%); border-radius: 3px; flex-shrink: 0; box-shadow: 0 2px 4px rgba(96, 165, 250, 0.4);"></span>
                                    <span style="font-size: 0.75rem; font-weight: 600;">Leadership Tour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photographs Section -->
                <div class="section">
                    <div class="section-header">Photographs</div>
                    <div class="section-content">
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">Photographs</h3>
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

    <script>
        // Auto-hide success banner after 5 seconds
        const successBanner = document.querySelector('.success-banner');
        if (successBanner) {
            setTimeout(() => {
                successBanner.style.transition = 'all 0.5s ease';
                successBanner.style.transform = 'translateY(-100%)';
                successBanner.style.opacity = '0';
                setTimeout(() => {
                    successBanner.remove();
                }, 500);
            }, 5000);
        }
    </script>
</body>
</html>
