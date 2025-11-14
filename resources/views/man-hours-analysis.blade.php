<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man Hours Analysis - SHEQXEL™</title>
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
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            padding: 1.5rem;
            color: #333;
            min-height: 100vh;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(21, 101, 192, 0.1);
        }

        .card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .header-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-left: 5px solid #1565c0;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .logo-title {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .logo {
            height: 60px;
            width: auto;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .page-title {
            font-size: 2.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, #1565c0 0%, #1976d2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .nav-btn {
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #1565c0 0%, #1976d2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(21, 101, 192, 0.3);
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(21, 101, 192, 0.4);
            background: linear-gradient(135deg, #1976d2 0%, #1565c0 100%);
        }

        .filters-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .filters-section {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            font-weight: 600;
            font-size: 0.95rem;
            color: #555;
            white-space: nowrap;
        }

        .filter-select {
            padding: 0.75rem 1.25rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.9rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 150px;
        }

        .filter-select:hover {
            border-color: #1565c0;
        }

        .filter-select:focus {
            outline: none;
            border-color: #1565c0;
            box-shadow: 0 0 0 3px rgba(21, 101, 192, 0.1);
        }

        .kpi-card-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
        }

        .kpi-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border-left: 5px solid #1565c0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .kpi-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, rgba(21, 101, 192, 0.05) 0%, transparent 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .kpi-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(21, 101, 192, 0.15);
        }

        .kpi-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .kpi-value {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1565c0 0%, #1976d2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .table-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1565c0;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #e3f2fd;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(135deg, #1565c0 0%, #1976d2 100%);
            border-radius: 2px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .data-table th,
        .data-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .data-table th {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            font-weight: 700;
            color: #1565c0;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .data-table tr {
            transition: all 0.2s ease;
        }

        .data-table tr:hover {
            background: #f5f5f5;
            transform: scale(1.01);
        }

        .data-table td {
            font-weight: 500;
            color: #555;
        }

        .chart-section {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .chart-container {
            position: relative;
            height: 300px;
            margin-top: 1rem;
        }

        .gauge-container {
            position: relative;
            height: 250px;
            margin-top: 1rem;
        }

        .bar-chart-container {
            position: relative;
            height: 250px;
            margin-top: 1rem;
        }

        .charts-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .combination-chart {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .combination-chart-container {
            position: relative;
            height: 300px;
            margin-top: 1rem;
        }

        .back-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 12px rgba(100, 116, 139, 0.4);
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(100, 116, 139, 0.5);
        }

        @media (max-width: 1200px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            .charts-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .kpi-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('hse-monitoring') }}" class="back-btn">
        <span style="font-size: 1.1rem;">←</span>
        <span>Back</span>
    </a>

    <!-- Header Card -->
    <div class="card header-card">
        <div class="header-section">
            <div class="logo-title">
                <img src="{{ asset('images/gdap.jpg') }}" alt="SHEQXEL Logo" class="logo">
                <h1 class="page-title">Man Hours Analysis</h1>
            </div>
            <div class="nav-buttons">
                <button class="nav-btn">Home</button>
                <button class="nav-btn">Summary</button>
                <button class="nav-btn">Clear all slicers</button>
            </div>
        </div>
    </div>

    <!-- Filters Card -->
    <div class="card filters-card">
        <div class="filters-section">
            <div class="filter-group">
                <span class="filter-label">Company:</span>
                <select class="filter-select">
                    <option>All</option>
                </select>
            </div>
            <div class="filter-group">
                <span class="filter-label">Month:</span>
                <select class="filter-select">
                    <option>All</option>
                </select>
            </div>
            <div class="filter-group">
                <span class="filter-label">Quarter:</span>
                <select class="filter-select">
                    <option>All</option>
                </select>
            </div>
            <div class="filter-group">
                <span class="filter-label">Year:</span>
                <select class="filter-select">
                    <option>All</option>
                </select>
            </div>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="card">
        <div class="kpi-card-wrapper">
            <div class="kpi-card">
                <div class="kpi-label">Number of Workers</div>
                <div class="kpi-value">271</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Man Hours Worked</div>
                <div class="kpi-value">2M</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Man Hours Lost from LTI</div>
                <div class="kpi-value">4K</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Safe Man Hours</div>
                <div class="kpi-value">2M</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">% Safe Man Hours</div>
                <div class="kpi-value">99.78%</div>
            </div>
        </div>
    </div>

    <!-- Main Content: Table and Gauge Chart -->
    <div class="main-content">
        <!-- Safe Man Hours from Workforce Table -->
        <div class="card table-section">
            <h2 class="section-title">Safe Man Hours from Workforce</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Number of Workers</th>
                        <th>Man Hours Worked</th>
                        <th>Man Hours Lost from LTI</th>
                        <th>Safe Man Hours</th>
                        <th>% Safe Man Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan</td>
                        <td>271</td>
                        <td>147546</td>
                        <td>512</td>
                        <td>147034</td>
                        <td>99.65%</td>
                    </tr>
                    <tr>
                        <td>Feb</td>
                        <td>271</td>
                        <td>147546</td>
                        <td>0</td>
                        <td>147546</td>
                        <td>100.00%</td>
                    </tr>
                    <tr>
                        <td>Mar</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>292</td>
                        <td>154280</td>
                        <td>99.81%</td>
                    </tr>
                    <tr>
                        <td>Apr</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>120</td>
                        <td>154452</td>
                        <td>99.92%</td>
                    </tr>
                    <tr>
                        <td>May</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>946</td>
                        <td>153626</td>
                        <td>99.39%</td>
                    </tr>
                    <tr>
                        <td>Jun</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>0</td>
                        <td>154572</td>
                        <td>100.00%</td>
                    </tr>
                    <tr>
                        <td>Jul</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>88</td>
                        <td>154484</td>
                        <td>99.94%</td>
                    </tr>
                    <tr>
                        <td>Aug</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>432</td>
                        <td>154140</td>
                        <td>99.72%</td>
                    </tr>
                    <tr>
                        <td>Sep</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>628</td>
                        <td>153944</td>
                        <td>99.59%</td>
                    </tr>
                    <tr>
                        <td>Oct</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>0</td>
                        <td>154572</td>
                        <td>100.00%</td>
                    </tr>
                    <tr>
                        <td>Nov</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>544</td>
                        <td>154028</td>
                        <td>99.65%</td>
                    </tr>
                    <tr>
                        <td>Dec</td>
                        <td>271</td>
                        <td>154572</td>
                        <td>494</td>
                        <td>154078</td>
                        <td>99.68%</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Gauge Chart and Bar Chart -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Safe Man Hours Score Gauge -->
            <div class="card chart-section">
                <h2 class="section-title">Safe Man Hours Score</h2>
                <div class="gauge-container">
                    <canvas id="gaugeChart"></canvas>
                </div>
            </div>

            <!-- Man Days Lost Bar Chart -->
            <div class="card chart-section">
                <h2 class="section-title">Man Days Lost</h2>
                <div class="bar-chart-container">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Combination Charts Row -->
    <div class="charts-row">
        <!-- Man Hours Worked vs % Safe Man Hours -->
        <div class="card combination-chart">
            <h2 class="section-title">Man Hours Worked vs % Safe Man Hours</h2>
            <div class="combination-chart-container">
                <canvas id="chart1"></canvas>
            </div>
        </div>

        <!-- Man Hours Worked vs TRIFR -->
        <div class="card combination-chart">
            <h2 class="section-title">Man Hours Worked vs TRIFR</h2>
            <div class="combination-chart-container">
                <canvas id="chart2"></canvas>
            </div>
        </div>

        <!-- Man Hours Worked vs LTIFR -->
        <div class="card combination-chart">
            <h2 class="section-title">Man Hours Worked vs LTIFR</h2>
            <div class="combination-chart-container">
                <canvas id="chart3"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Gauge Chart
        const gaugeCtx = document.getElementById('gaugeChart').getContext('2d');
        const gaugeChart = new Chart(gaugeCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [99.78, 0.22],
                    backgroundColor: ['#4CAF50', '#E0E0E0'],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                circumference: 180,
                rotation: -90,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false
                    }
                },
                maintainAspectRatio: false
            },
            plugins: [{
                id: 'gaugeText',
                afterDraw: (chart) => {
                    const ctx = chart.ctx;
                    const centerX = chart.chartArea.left + (chart.chartArea.right - chart.chartArea.left) / 2;
                    const centerY = chart.chartArea.top + (chart.chartArea.bottom - chart.chartArea.top) / 2 + 20;
                    
                    // Draw gauge scale (0.00% to 100.00%)
                    ctx.save();
                    ctx.font = '12px Inter';
                    ctx.fillStyle = '#666';
                    ctx.textAlign = 'left';
                    ctx.fillText('0.00%', chart.chartArea.left, centerY + 30);
                    ctx.textAlign = 'right';
                    ctx.fillText('100.00%', chart.chartArea.right, centerY + 30);
                    ctx.restore();
                    
                    // Draw value text
                    ctx.save();
                    ctx.font = 'bold 36px Inter';
                    ctx.fillStyle = '#333';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText('99.78%', centerX, centerY - 10);
                    
                    ctx.font = '13px Inter';
                    ctx.fillStyle = '#666';
                    ctx.fillText('Percentage of safe man hours', centerX, centerY + 20);
                    ctx.restore();
                }
            }]
        });

        // Bar Chart - Man Days Lost
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['SHEQXEL', 'MATSFIELD', 'ELISAFETY'],
                datasets: [{
                    label: 'Man Days Lost',
                    data: [296, 104, 81],
                    backgroundColor: '#1565c0'
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false
            }
        });

        // Combination Chart 1: Man Hours Worked vs % Safe Man Hours
        const ctx1 = document.getElementById('chart1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['ELISAFETY', 'MATSFIELD', 'SHEQXEL'],
                datasets: [
                    {
                        type: 'bar',
                        label: 'Man Hours Worked',
                        data: [500000, 500000, 500000],
                        backgroundColor: '#1565c0',
                        yAxisID: 'y'
                    },
                    {
                        type: 'line',
                        label: '% Safe Man Hours',
                        data: [99.88, 99.85, 99.61],
                        borderColor: '#FFC107',
                        backgroundColor: '#FFC107',
                        fill: false,
                        yAxisID: 'y1',
                        tension: 0.4
                    }
                ]
            },
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true
                    },
                    y1: {
                        type: 'linear',
                        position: 'right',
                        beginAtZero: false,
                        min: 99.6,
                        max: 99.9,
                        grid: {
                            drawOnChartArea: false
                        }
                    }
                },
                maintainAspectRatio: false
            }
        });

        // Combination Chart 2: Man Hours Worked vs TRIFR
        const ctx2 = document.getElementById('chart2').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['ELISAFETY', 'MATSFIELD', 'SHEQXEL'],
                datasets: [
                    {
                        type: 'bar',
                        label: 'Man Hours Worked',
                        data: [500000, 500000, 500000],
                        backgroundColor: '#1565c0',
                        yAxisID: 'y'
                    },
                    {
                        type: 'line',
                        label: 'TRIFR (Cont.)',
                        data: [10.2, 7.3, 10.2],
                        borderColor: '#FFC107',
                        backgroundColor: '#FFC107',
                        fill: false,
                        yAxisID: 'y1',
                        tension: 0.4
                    }
                ]
            },
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true
                    },
                    y1: {
                        type: 'linear',
                        position: 'right',
                        beginAtZero: false,
                        min: 7,
                        max: 10.5,
                        grid: {
                            drawOnChartArea: false
                        }
                    }
                },
                maintainAspectRatio: false
            }
        });

        // Combination Chart 3: Man Hours Worked vs LTIFR
        const ctx3 = document.getElementById('chart3').getContext('2d');
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['ELISAFETY', 'MATSFIELD', 'SHEQXEL'],
                datasets: [
                    {
                        type: 'bar',
                        label: 'Man Hours Worked',
                        data: [500000, 500000, 500000],
                        backgroundColor: '#1565c0',
                        yAxisID: 'y'
                    },
                    {
                        type: 'line',
                        label: 'LTIFR (Cont.)',
                        data: [3.3, 2.0, 4.6],
                        borderColor: '#FFC107',
                        backgroundColor: '#FFC107',
                        fill: false,
                        yAxisID: 'y1',
                        tension: 0.4
                    }
                ]
            },
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true
                    },
                    y1: {
                        type: 'linear',
                        position: 'right',
                        beginAtZero: false,
                        min: 2,
                        max: 5,
                        grid: {
                            drawOnChartArea: false
                        }
                    }
                },
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>

