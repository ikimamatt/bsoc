<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Page HSE Monthly Executive Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
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

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-logo {
            height: 50px;
            width: auto;
            object-fit: contain;
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
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .month-selector {
            background: rgba(255, 255, 255, 0.25);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            outline: none;
        }

        .month-selector:hover {
            background: rgba(255, 255, 255, 0.35);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .month-selector:focus {
            background: rgba(255, 255, 255, 0.35);
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        .month-selector option {
            background: #1e40af;
            color: white;
            padding: 0.5rem;
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

        /* Chart Container */
        .chart-container {
            position: relative;
            height: 200px;
            margin-bottom: 1.25rem;
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .chart-container.large {
            height: 250px;
        }

        .chart-container.small {
            height: 150px;
        }

        /* HSSE Performance Dashboard */
        .hsse-dashboard {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 12px;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hsse-dashboard::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.3;
            pointer-events: none;
        }

        .hsse-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .hsse-title {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .pyramid-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 2rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .pyramid {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            max-width: 450px;
            gap: 0.35rem;
        }

        .pyramid-level {
            padding: 0.625rem 0.875rem;
            margin-bottom: 0;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.7rem;
            font-weight: 600;
            position: relative;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            min-height: 38px;
            box-sizing: border-box;
            overflow: hidden;
            gap: 0.75rem;
        }

        .pyramid-level:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .pyramid-level:nth-child(1) { 
            width: 55%; 
            margin-left: auto;
            margin-right: 0;
        }
        .pyramid-level:nth-child(2) { 
            width: 65%; 
            margin-left: auto;
            margin-right: 0;
        }
        .pyramid-level:nth-child(3) { 
            width: 75%; 
            margin-left: auto;
            margin-right: 0;
        }
        .pyramid-level:nth-child(4) { 
            width: 82%; 
            margin-left: auto;
            margin-right: 0;
        }
        .pyramid-level:nth-child(5) { 
            width: 88%; 
            margin-left: auto;
            margin-right: 0;
        }
        .pyramid-level:nth-child(6) { 
            width: 94%; 
            margin-left: auto;
            margin-right: 0;
        }
        .pyramid-level:nth-child(7) { 
            width: 100%; 
        }

        .pyramid-level.fatality {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }

        .pyramid-level.lti {
            background: linear-gradient(135deg, #ea580c 0%, #c2410c 100%);
        }

        .pyramid-level.rwdc-mtc {
            background: linear-gradient(135deg, #eab308 0%, #ca8a04 100%);
        }

        .pyramid-level.ed-ml-ps {
            background: linear-gradient(135deg, #84cc16 0%, #65a30d 100%);
        }

        .pyramid-level.fac {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .pyramid-level.inc-nmi {
            background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
        }

        .pyramid-level.bsoc {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
        }

        .pyramid-value {
            font-weight: 800;
            font-size: 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            min-width: 45px;
            max-width: 80px;
            text-align: center;
            backdrop-filter: blur(5px);
            flex-shrink: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pyramid-level span:first-child {
            flex: 1;
            min-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .hsse-stats-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hsse-stats-box.large {
            padding: 1.5rem;
        }

        .hsse-stats-label {
            font-size: 0.7rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .hsse-stats-value {
            font-size: 1.5rem;
            font-weight: 800;
            color: #60a5fa;
        }

        .hsse-stats-value.large {
            font-size: 2rem;
        }

        .hsse-summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .hsse-summary-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hsse-summary-title {
            font-size: 0.7rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #60a5fa;
        }

        .hsse-summary-value {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .hsse-summary-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 0.65rem;
        }

        .hsse-summary-list li {
            margin-bottom: 0.25rem;
            padding-left: 0.5rem;
        }

        .hsse-summary-percentage {
            font-size: 0.75rem;
            font-weight: 700;
            color: #84cc16;
            margin-top: 0.5rem;
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
        <div class="header-left">
            <img src="{{ asset('images/gdap.jpg') }}" alt="GDAP Logo" class="header-logo">
            <h1>GDAP - One Page HSE Monthly Executive Report</h1>
        </div>
        <div class="month">
            <span>Month:</span>
            <input type="month" 
                   id="monthSelector" 
                   class="month-selector" 
                   value="{{ $hseData['month_year'] ?? date('Y-m') }}" 
                   onchange="changeMonth(this.value)">
        </div>
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
                        <!-- HSSE Performance -->
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSSE Performance</h3>
                            <table class="table" style="font-size: 0.65rem;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 40%;">HSSE Performance</th>
                                        <th style="width: 20%;">Target</th>
                                        <th style="width: 20%;">Realization</th>
                                        <th style="width: 15%;">Achievement (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Section A: Leading Indicator -->
                                    <tr style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);">
                                        <td colspan="5" style="font-weight: 700; padding: 0.5rem;">A. Leading Indicator</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>MWT</td>
                                        <td>1x / 3 Months</td>
                                        <td>{{ $hseData['hsse_performance']['mwt_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['mwt_achievement'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Senior Management (Director / Manager)</td>
                                        <td>1x / 3 Months</td>
                                        <td>{{ $hseData['hsse_performance']['senior_mgmt_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['senior_mgmt_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Rig Manager</td>
                                        <td>1x / Month</td>
                                        <td>{{ $hseData['hsse_performance']['rig_manager_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['rig_manager_achievement'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">HSSE Manager</td>
                                        <td>1x / Month</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_manager_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_manager_achievement'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 2: Socialization HSSE Policy -->
                                    <tr>
                                        <td>2</td>
                                        <td>Socialization HSSE Policy</td>
                                        <td>Yearly</td>
                                        <td>{{ $hseData['hsse_performance']['socialization_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['socialization_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 3: HSSE Meeting -->
                                    <tr>
                                        <td>3</td>
                                        <td>HSSE Meeting</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Pre-Job Meeting / Toolbox Meeting</td>
                                        <td>Setiap shift</td>
                                        <td>{{ $hseData['hsse_performance']['toolbox_realization'] ?? '60' }}</td>
                                        <td>{{ $hseData['hsse_performance']['toolbox_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Safety Talks</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['safety_talks_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['safety_talks_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;"># Speak Up</td>
                                        <td>Daily</td>
                                        <td>{{ $hseData['hsse_performance']['speak_up_realization'] ?? '30' }}</td>
                                        <td>{{ $hseData['hsse_performance']['speak_up_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;"># Perwira Safety</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['perwira_safety_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['perwira_safety_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;"># View & Review</td>
                                        <td>Daily</td>
                                        <td>{{ $hseData['hsse_performance']['view_review_realization'] ?? '30' }}</td>
                                        <td>{{ $hseData['hsse_performance']['view_review_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Safety Stand Down</td>
                                        <td>Triwulan</td>
                                        <td>{{ $hseData['hsse_performance']['safety_stand_down_realization'] ?? '3' }}</td>
                                        <td>{{ $hseData['hsse_performance']['safety_stand_down_achievement'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">HSE Coordination Meeting / Level III</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['hse_coord_meeting_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hse_coord_meeting_achievement'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">HSE Meeting Level IV</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['hse_meeting_lv4_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hse_meeting_lv4_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 4: HOC CARD -->
                                    <tr>
                                        <td>4</td>
                                        <td>HOC CARD (Safety & Intervention Program)</td>
                                        <td>1 card per person/day</td>
                                        <td>{{ $hseData['hsse_performance']['hoc_card_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hoc_card_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 5: HSSE Performance Reporting -->
                                    <tr>
                                        <td>5</td>
                                        <td>HSSE Performance Reporting</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['performance_reporting_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['performance_reporting_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 6: Medical Check-up -->
                                    <tr>
                                        <td>6</td>
                                        <td>Medical Check-up</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Pre-Employment (Before the project starts)</td>
                                        <td>Yearly No MCU Entry</td>
                                        <td>{{ $hseData['hsse_performance']['pre_employment_mcu_realization'] ?? '(Updated on Matrix Training)' }}</td>
                                        <td>{{ $hseData['hsse_performance']['pre_employment_mcu_achievement'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Annual MCU (1x a year)</td>
                                        <td>{{ $hseData['hsse_performance']['annual_mcu_target'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['annual_mcu_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['annual_mcu_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 7: Safety induction -->
                                    <tr>
                                        <td>7</td>
                                        <td>Safety induction</td>
                                        <td>Every first entry</td>
                                        <td>{{ $hseData['hsse_performance']['safety_induction_realization'] ?? '7' }}</td>
                                        <td>{{ $hseData['hsse_performance']['safety_induction_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 8: HSE Training Certification and Competence -->
                                    <tr>
                                        <td>8</td>
                                        <td>HSE Training Certification and Competence (MIGAS and Government Regulations)</td>
                                        <td>100%</td>
                                        <td>{{ $hseData['hsse_performance']['hse_training_cert_realization'] ?? '(Updated on Matrix Training)' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hse_training_cert_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 9: HSSE Inspection -->
                                    <tr>
                                        <td>9</td>
                                        <td>HSSE Inspection</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Industrial Hygiene Monitoring / Inspection of the quality of the work environment: illumination Survey industrial Noise Survey</td>
                                        <td>Yearly</td>
                                        <td>{{ $hseData['hsse_performance']['industrial_hygiene_realization'] ?? '1 (Noise)' }}</td>
                                        <td>{{ $hseData['hsse_performance']['industrial_hygiene_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Daily Inspection Crane</td>
                                        <td>Daily</td>
                                        <td>{{ $hseData['hsse_performance']['daily_crane_inspection_realization'] ?? '30' }}</td>
                                        <td>{{ $hseData['hsse_performance']['daily_crane_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Weekly Inspection Crane</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['weekly_crane_inspection_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['weekly_crane_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Fire Pump Inspection & Testing</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['fire_pump_inspection_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['fire_pump_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Hand & Portable Power Tools Check List</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['power_tools_check_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['power_tools_check_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Waste Transfer Note</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['waste_transfer_note_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['waste_transfer_note_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Workplace Inspection (Inspeksi Kesehatan & Kebersihan)</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['workplace_inspection_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['workplace_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Housekeeping, Proper Storage & Used Proper Tool</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['housekeeping_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['housekeeping_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Safety Equipment and Maintenance</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['safety_equipment_maintenance_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['safety_equipment_maintenance_achievement'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Section: Inspection -->
                                    <tr style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);">
                                        <td colspan="5" style="font-weight: 700; padding: 0.5rem;">Inspection</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>PPE Inspection</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['ppe_inspection_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['ppe_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Lifting Gear Inspection</td>
                                        <td>1x per 6 months</td>
                                        <td>{{ $hseData['hsse_performance']['lifting_gear_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['lifting_gear_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Rig Inspection</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['rig_inspection_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['rig_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>SECE Inspection</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['sece_inspection_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['sece_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Preventive Maintenance System</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['preventive_maintenance_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['preventive_maintenance_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Hygiene Inspection at Galley</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['hygiene_inspection_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hygiene_inspection_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Pest Control</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['pest_control_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['pest_control_achievement'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 10: Emergency Drill -->
                                    <tr>
                                        <td>10</td>
                                        <td>Emergency Drill</td>
                                        <td>Weekly</td>
                                        <td>{{ $hseData['hsse_performance']['emergency_drill_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['emergency_drill_achievement'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- Fire Drill</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- Abandoning Rig</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- General Alarm – Mustering Only Man</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- Overboard Rescue</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- Medevac (Illness Case & Evacuation)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- Security Threat</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">- Environment – Oil Spill on Rig</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Abandon & Fire Drill on 15 Oct 2025</td>
                                        <td>15 Oct 2025</td>
                                        <td></td>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Confined Space Drill on 29 Oct 2025</td>
                                        <td>29 Oct 2025</td>
                                        <td></td>
                                        <td>100</td>
                                    </tr>
                                    
                                    <!-- Item 11: HSSE Promotion -->
                                    <tr>
                                        <td>11</td>
                                        <td>HSSE Promotion</td>
                                        <td></td>
                                        <td>{{ $hseData['hsse_performance']['hsse_promotion_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_promotion_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 12: HSSE Award -->
                                    <tr>
                                        <td>12</td>
                                        <td>HSSE Award</td>
                                        <td>Monthly</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_award_realization'] ?? '4' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_award_achievement'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 13: HSSE Internal Audit -->
                                    <tr>
                                        <td>13</td>
                                        <td>HSSE Internal Audit</td>
                                        <td>1x per 6 months</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_internal_audit_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['hsse_internal_audit_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 14: Investigation Incident -->
                                    <tr>
                                        <td>14</td>
                                        <td>Investigation Incident</td>
                                        <td></td>
                                        <td>{{ $hseData['hsse_performance']['investigation_incident_realization'] ?? '0' }}</td>
                                        <td>{{ $hseData['hsse_performance']['investigation_incident_achievement'] ?? '' }}</td>
                                    </tr>
                                    
                                    <!-- Item 15: Follow up Audit/Inspection -->
                                    <tr>
                                        <td>15</td>
                                        <td>Follow up Audit/Inspection</td>
                                        <td></td>
                                        <td>{{ $hseData['hsse_performance']['follow_up_audit_realization'] ?? '1' }}</td>
                                        <td>{{ $hseData['hsse_performance']['follow_up_audit_achievement'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 16: Audit CSMS -->
                                    <tr>
                                        <td>16</td>
                                        <td>Audit CSMS</td>
                                        <td></td>
                                        <td>{{ $hseData['hsse_performance']['audit_csms_realization'] ?? '' }}</td>
                                        <td>{{ $hseData['hsse_performance']['audit_csms_achievement'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">CSMS PB (Penilaian Berjalan) – Work-in Progress</td>
                                        <td>September, April</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">CSMS PA (Penilaian Akhir) – Final Evaluation</td>
                                        <td>June 2027</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <table class="table" style="font-size: 0.65rem;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">B</th>
                                        <th style="width: 50%;">Lagging Indicator</th>
                                        <th style="width: 15%;">{{ $hseData['month'] ?? 'Oct-25' }}</th>
                                        <th style="width: 15%;">YTD</th>
                                        <th style="width: 15%;">ITD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Section B: Lagging Indicator -->
                                    <tr style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);">
                                        <td colspan="5" style="font-weight: 700; padding: 0.5rem;">B. Lagging Indicator</td>
                                    </tr>
                                    
                                    <!-- Item 1: Number of Nearmiss -->
                                    <tr>
                                        <td>1</td>
                                        <td>Number of Nearmiss</td>
                                        <td>{{ $hseData['lagging_indicators']['nearmiss_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['nearmiss_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['nearmiss_itd'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 2: Number of First Aid -->
                                    <tr>
                                        <td>2</td>
                                        <td>Number of First Aid</td>
                                        <td>{{ $hseData['lagging_indicators']['first_aid_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['first_aid_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['first_aid_itd'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 3: Number Recordable Case -->
                                    <tr>
                                        <td>3</td>
                                        <td>Number Recordable Case</td>
                                        <td>{{ $hseData['lagging_indicators']['recordable_case_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['recordable_case_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['recordable_case_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Fatality</td>
                                        <td>{{ $hseData['lagging_indicators']['fatality_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['fatality_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['fatality_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Loss Time Incident (LTI)</td>
                                        <td>{{ $hseData['lagging_indicators']['lti_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['lti_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['lti_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Restricted Work Day Case (RWDC)</td>
                                        <td>{{ $hseData['lagging_indicators']['rwdc_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['rwdc_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['rwdc_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Medical Treatment Case (MTC)</td>
                                        <td>{{ $hseData['lagging_indicators']['mtc_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['mtc_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['mtc_itd'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 4: Enviromental Case -->
                                    <tr>
                                        <td>4</td>
                                        <td>Enviromental Case</td>
                                        <td>{{ $hseData['lagging_indicators']['environmental_case_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['environmental_case_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['environmental_case_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Oil Spill</td>
                                        <td>{{ $hseData['lagging_indicators']['oil_spill_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['oil_spill_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['oil_spill_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Hydrocarbon Release</td>
                                        <td>{{ $hseData['lagging_indicators']['hydrocarbon_release_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['hydrocarbon_release_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['hydrocarbon_release_itd'] ?? '100' }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-left: 1rem;">Non-Compliance Case</td>
                                        <td>{{ $hseData['lagging_indicators']['non_compliance_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['non_compliance_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['non_compliance_itd'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 5: Fire / Explosion -->
                                    <tr>
                                        <td>5</td>
                                        <td>Fire / Explosion</td>
                                        <td>{{ $hseData['lagging_indicators']['fire_explosion_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['fire_explosion_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['fire_explosion_itd'] ?? '100' }}</td>
                                    </tr>
                                    
                                    <!-- Item 6: Property Damage -->
                                    <tr>
                                        <td>6</td>
                                        <td>Property Damage</td>
                                        <td>{{ $hseData['lagging_indicators']['property_damage_oct25'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['property_damage_ytd'] ?? '0' }}</td>
                                        <td>{{ $hseData['lagging_indicators']['property_damage_itd'] ?? '100' }}</td>
                                    </tr>
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
                            
                            <!-- HSE Observation Chart -->
                            <div class="chart-container">
                                <canvas id="observationChart"></canvas>
                            </div>
                        </div>

                        <!-- HSE Statistics Charts -->
                        <div style="margin-bottom: 1.25rem;">
                            <h3 style="font-size: 0.75rem; font-weight: 700; margin-bottom: 0.625rem; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; padding: 0.625rem 0.875rem; border-radius: 8px; text-transform: uppercase; letter-spacing: 0.05em; box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);">HSE Statistics Overview</h3>
                            
                            <!-- Training & Hours Chart -->
                            <div class="chart-container">
                                <canvas id="trainingChart"></canvas>
                            </div>
                            
                            <!-- Incident & Safety Metrics Chart -->
                            <div class="chart-container">
                                <canvas id="incidentChart"></canvas>
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

                <!-- GDAP HSSE Performance Dashboard -->
                <div class="section" style="margin-top: 2rem;">
                    <div class="section-header">HSSE Performance</div>
                    <div class="section-content">
                        <div class="hsse-dashboard">
                            <!-- Header -->
                            <div class="hsse-header">
                                <div class="hsse-title">GDAP HSSE PERFORMANCE</div>
                            </div>

                            <!-- Pyramid and Stats Container -->
                            <div class="pyramid-container">
                                <!-- Pyramid Diagram -->
                                <div class="pyramid">
                                    <div class="pyramid-level fatality">
                                        <span>Fatality</span>
                                        <span class="pyramid-value">{{ $hseData['hsse_performance']['fatality'] ?? '0' }}</span>
                                    </div>
                                    <div class="pyramid-level lti">
                                        <span>LTI (Lost Time Injury)</span>
                                        <span class="pyramid-value">{{ $hseData['hsse_performance']['lti'] ?? '0' }}</span>
                                    </div>
                                    <div class="pyramid-level rwdc-mtc">
                                        <span>RWDC/MTC (Restricted Work Day Case / Medical Treatment Case)</span>
                                        <span class="pyramid-value">{{ $hseData['hsse_performance']['rwdc'] ?? '0' }}/{{ $hseData['hsse_performance']['mtc'] ?? '0' }}</span>
                                    </div>
                                    <div class="pyramid-level ed-ml-ps">
                                        <span>ED/ML/PS (Environmental Damage / Material Loss / Production Shortfall)</span>
                                        <span class="pyramid-value">{{ $hseData['hsse_performance']['ed'] ?? '0' }}/{{ $hseData['hsse_performance']['ml'] ?? '1' }}/{{ $hseData['hsse_performance']['ps'] ?? '0' }}</span>
                                    </div>
                                    <div class="pyramid-level fac">
                                        <span>FAC (First Aid Case)</span>
                                        <span class="pyramid-value">{{ $hseData['hsse_performance']['fac'] ?? '3' }}</span>
                                    </div>
                                    <div class="pyramid-level inc-nmi">
                                        <span>INC/NMI (Incident / Near Miss Incident)</span>
                                        <span class="pyramid-value">{{ $hseData['hsse_performance']['inc'] ?? '0' }}/{{ $hseData['hsse_performance']['nmi'] ?? '0' }}</span>
                                    </div>
                                    <div class="pyramid-level bsoc">
                                        <span>BSOC Report</span>
                                        <span class="pyramid-value">{{ number_format($hseData['hsse_performance']['bsoc'] ?? 25721, 0, ',', '.') }}</span>
                                    </div>
                                </div>

                                <!-- Right Side Stats -->
                                <div style="display: flex; flex-direction: column; gap: 1.5rem; min-width: 180px; flex-shrink: 0;">
                                    <!-- Days Without LTI -->
                                    <div class="hsse-stats-box large" style="background: rgba(255, 255, 255, 0.12); border: 2px solid rgba(96, 165, 250, 0.3);">
                                        <div class="hsse-stats-value large" style="color: #60a5fa; font-size: 2.5rem;">{{ $hseData['hsse_performance']['days_without_lti'] ?? '209' }}</div>
                                        <div class="hsse-stats-label" style="font-size: 0.75rem; margin-top: 0.5rem;">Days Without LTI</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Man-hours and YTD -->
                            <div style="display: flex; justify-content: space-between; align-items: center; gap: 1.5rem; margin-bottom: 2rem; position: relative; z-index: 1;">
                                <div class="hsse-stats-box" style="flex: 1; background: rgba(255, 255, 255, 0.12); border: 2px solid rgba(96, 165, 250, 0.2);">
                                    <div class="hsse-stats-label" style="font-size: 0.75rem; margin-bottom: 0.75rem;">Total Man-hours</div>
                                    <div class="hsse-stats-value" style="font-size: 1.75rem; color: #60a5fa;">{{ number_format($hseData['hsse_performance']['total_manhours'] ?? 274344, 0, ',', '.') }} Mmh</div>
                                </div>
                                <div class="hsse-stats-box large" style="background: rgba(255, 255, 255, 0.15); border: 2px solid rgba(255, 255, 255, 0.3); flex: 0 0 auto; min-width: 180px;">
                                    <div class="hsse-stats-value large" style="font-size: 2rem; color: #60a5fa;">2025</div>
                                    <div class="hsse-stats-label" style="font-size: 0.75rem; margin-top: 0.5rem;">(YTD)</div>
                                </div>
                            </div>

                            <!-- Summary Boxes -->
                            <div class="hsse-summary-grid">
                                <!-- Stop Job -->
                                <div class="hsse-summary-box">
                                    <div class="hsse-summary-value">{{ number_format($hseData['hsse_performance']['stop_job'] ?? 1305, 0, ',', '.') }} Stop Job in 2025</div>
                                </div>

                                <!-- HOC -->
                                <div class="hsse-summary-box">
                                    <div class="hsse-summary-value">{{ number_format($hseData['hsse_performance']['hoc'] ?? 25721, 0, ',', '.') }} HOC in 2025</div>
                                    <div style="font-size: 0.65rem; opacity: 0.8; margin-top: 0.25rem;">(Rig Personnel)</div>
                                </div>

                                <!-- UA/UC -->
                                <div class="hsse-summary-box">
                                    <div class="hsse-summary-title">UA/UC - Unsafe Act/Unsafe Condition</div>
                                    <div style="font-size: 0.7rem; font-weight: 600; margin-bottom: 0.5rem;">Top 3 CLSR:</div>
                                    <ul class="hsse-summary-list">
                                        <li>➤ {{ $hseData['hsse_performance']['top_clsr_1'] ?? 'Line of Fire' }}</li>
                                        <li>➤ {{ $hseData['hsse_performance']['top_clsr_2'] ?? 'Tools & Equipment' }}</li>
                                        <li>➤ {{ $hseData['hsse_performance']['top_clsr_3'] ?? 'Water-Based Work Activities' }}</li>
                                    </ul>
                                    <div class="hsse-summary-percentage">% Closure UA/UC: >{{ $hseData['hsse_performance']['closure_percentage'] ?? '85' }}%</div>
                                </div>
                            </div>
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

        // HSE Observation Chart (Pie Chart)
        const observationCtx = document.getElementById('observationChart');
        if (observationCtx) {
            new Chart(observationCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Positive', 'Negative'],
                    datasets: [{
                        label: 'HSE Observations',
                        data: [
                            {{ $hseData['hse_observations_positive'] ?? 850 }},
                            {{ $hseData['hse_observations_negative'] ?? 400 }}
                        ],
                        backgroundColor: [
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(239, 68, 68, 0.8)'
                        ],
                        borderColor: [
                            'rgba(16, 185, 129, 1)',
                            'rgba(239, 68, 68, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: {
                                    size: 10,
                                    family: 'Inter'
                                },
                                padding: 10
                            }
                        },
                        title: {
                            display: true,
                            text: 'HSE Observation Distribution',
                            font: {
                                size: 12,
                                weight: 'bold',
                                family: 'Inter'
                            },
                            padding: {
                                bottom: 10
                            }
                        }
                    }
                }
            });
        }

        // Training & Hours Chart (Bar Chart)
        const trainingCtx = document.getElementById('trainingChart');
        if (trainingCtx) {
            new Chart(trainingCtx, {
                type: 'bar',
                data: {
                    labels: ['Training Sessions', 'Training Hours'],
                    datasets: [{
                        label: 'HSE Training',
                        data: [
                            {{ $hseData['training_conducted'] ?? 25 }},
                            {{ $hseData['training_hours'] ?? 180 }}
                        ],
                        backgroundColor: [
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(59, 130, 246, 0.8)'
                        ],
                        borderColor: [
                            'rgba(16, 185, 129, 1)',
                            'rgba(59, 130, 246, 1)'
                        ],
                        borderWidth: 2,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 9,
                                    family: 'Inter'
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 9,
                                    family: 'Inter'
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'HSE Training Statistics',
                            font: {
                                size: 12,
                                weight: 'bold',
                                family: 'Inter'
                            },
                            padding: {
                                bottom: 10
                            }
                        }
                    }
                }
            });
        }

        // Incident & Safety Metrics Chart (Line Chart)
        const incidentCtx = document.getElementById('incidentChart');
        if (incidentCtx) {
            new Chart(incidentCtx, {
                type: 'line',
                data: {
                    labels: ['TRCF', 'LTIFR', 'A/I', 'Near Miss'],
                    datasets: [{
                        label: 'Safety Metrics',
                        data: [
                            {{ $hseData['trcf'] ?? 0.0 }},
                            {{ $hseData['ltifr'] ?? 0.0 }},
                            {{ $hseData['accident_incident'] ?? 0 }},
                            0
                        ],
                        borderColor: 'rgba(239, 68, 68, 1)',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: 'rgba(239, 68, 68, 1)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 9,
                                    family: 'Inter'
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 9,
                                    family: 'Inter'
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Incident & Safety Metrics',
                            font: {
                                size: 12,
                                weight: 'bold',
                                family: 'Inter'
                            },
                            padding: {
                                bottom: 10
                            }
                        }
                    }
                }
            });
        }

        // Function to handle month change
        function changeMonth(monthYear) {
            // Convert YYYY-MM to format like Oct-25
            const date = new Date(monthYear + '-01');
            const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const month = monthNames[date.getMonth()];
            const year = date.getFullYear().toString().slice(-2);
            const formattedMonth = `${month}-${year}`;
            
            // Reload page with month parameter
            const url = new URL(window.location.href);
            url.searchParams.set('month', monthYear);
            window.location.href = url.toString();
        }
    </script>
</body>
</html>
