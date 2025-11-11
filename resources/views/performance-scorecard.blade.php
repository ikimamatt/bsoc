<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDAP Performance Scorecard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f0f4f8;
            padding: 1.5rem;
            color: #1e293b;
        }

        .top-header {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 16px;
            padding: 1.5rem 2rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .brand {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1976d2;
        }

        .title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1565c0;
        }

        .header-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .header-btn {
            background: white;
            border: 2px solid #1976d2;
            border-radius: 25px;
            padding: 0.625rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1976d2;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .header-btn:hover {
            background: #1976d2;
            color: white;
        }

        .header-btn.active {
            background: #e3f2fd;
            border-color: #64b5f6;
            color: #1565c0;
        }

        .kpi-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .kpi-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #1976d2;
        }

        .kpi-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 0.5rem;
        }

        .kpi-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
        }

        .main-content {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .filters {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .filter-select {
            padding: 0.625rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            background: white;
            color: #1e293b;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #1976d2;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.75rem;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-weight: 700;
            padding: 0.75rem 0.5rem;
            text-align: center;
            border: 1px solid #e2e8f0;
            font-size: 0.7rem;
            white-space: nowrap;
        }

        td {
            padding: 0.625rem 0.5rem;
            text-align: center;
            border: 1px solid #e2e8f0;
            font-weight: 500;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .company-name {
            font-weight: 700;
            color: #1e293b;
            text-align: left;
            padding-left: 1rem;
        }

        .year-cell {
            font-weight: 600;
            color: #64748b;
        }

        .total-row {
            background: #f1f5f9;
            font-weight: 700;
        }

        .grand-total-row {
            background: #e2e8f0;
            font-weight: 800;
        }

        .metric-cell {
            background: #e3f2fd;
            font-weight: 600;
        }

        .percentage-cell {
            font-weight: 700;
            color: #1e293b;
        }

        .arrow-up {
            color: #10b981;
            margin-left: 0.25rem;
        }

        .arrow-down {
            color: #ef4444;
            margin-left: 0.25rem;
        }

        .expandable-row {
            cursor: pointer;
        }

        .expand-icon {
            display: inline-block;
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        .back-btn {
            position: fixed;
            top: 30px;
            left: 30px;
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            color: white;
            padding: 0.875rem 1.75rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: 0 8px 24px rgba(100, 116, 139, 0.4);
            z-index: 1001;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(100, 116, 139, 0.5);
        }

        @media (max-width: 1200px) {
            .kpi-cards {
                grid-template-columns: 1fr;
            }
            
            .filters {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .top-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .filters {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="{{ route('hse-monitoring') }}" class="back-btn">
        <span style="font-size: 1.25rem;">←</span>
        <span>Back to Monitoring</span>
    </a>

    <!-- Top Header -->
    <div class="top-header">
        <div class="header-left">
            <div class="brand">GDAP</div>
            <div class="title">Performance Scorecard</div>
        </div>
        <div class="header-buttons">
            <a href="{{ route('hse-monitoring') }}" class="header-btn">Home</a>
            <a href="{{ route('performance-scorecard') }}" class="header-btn active">Summary</a>
            <button class="header-btn" onclick="clearFilters()">Clear all slicers</button>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="kpi-cards">
        <div class="kpi-card">
            <div class="kpi-label">Total Incidents</div>
            <div class="kpi-value">335</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Days Since Last Fatality</div>
            <div class="kpi-value">812</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Days Since Last LTI</div>
            <div class="kpi-value">686</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Filters -->
        <div class="filters">
            <div class="filter-group">
                <label class="filter-label">Company</label>
                <select class="filter-select" id="companyFilter">
                    <option value="all">All</option>
                    <option value="elisafety">ELISAFETY</option>
                    <option value="matsfheld">MATSFHELD</option>
                    <option value="gdap">GDAP</option>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">Month</label>
                <select class="filter-select" id="monthFilter">
                    <option value="all">All</option>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">Quarter</label>
                <select class="filter-select" id="quarterFilter">
                    <option value="all">All</option>
                </select>
            </div>
            <div class="filter-group">
                <label class="filter-label">Year</label>
                <select class="filter-select" id="yearFilter">
                    <option value="all">All</option>
                </select>
            </div>
        </div>

        <!-- Data Table -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th rowspan="2">Company</th>
                        <th rowspan="2">Year</th>
                        <th rowspan="2">Fatality</th>
                        <th colspan="2">First Aid</th>
                        <th rowspan="2">Medical<br>Treatment<br>Cases</th>
                        <th rowspan="2">Near Miss<br>Cases</th>
                        <th rowspan="2">Restricte<br>d Work<br>Cases</th>
                        <th rowspan="2">Theft<br>Incident</th>
                        <th rowspan="2">Total<br>Recordable<br>Injuries</th>
                        <th rowspan="2">Environme<br>ntal<br>Incident</th>
                        <th rowspan="2">Permit to<br>Work Score</th>
                        <th rowspan="2">JSA/Risk<br>Assessment<br>Score</th>
                        <th rowspan="2">Toolbox<br>Talk Score</th>
                        <th rowspan="2">Permit to<br>Work Audit<br>Score</th>
                        <th rowspan="2">% Safe Man<br>Hours</th>
                        <th rowspan="2">Workplace<br>Inspection<br>Score</th>
                        <th rowspan="2">Equipmer<br>Inspectior<br>Score</th>
                    </tr>
                    <tr>
                        <th>Cases</th>
                        <th>Lost<br>Time<br>Injuries<br>Cases</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ELISAFETY -->
                    <tr class="expandable-row" onclick="toggleRows('elisafety')">
                        <td class="company-name">
                            <span class="expand-icon" id="icon-elisafety">⊟</span>
                            ELISAFETY
                        </td>
                        <td colspan="17"></td>
                    </tr>
                    <tr class="elisafety-row">
                        <td></td>
                        <td class="year-cell">2021</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">9</td>
                        <td class="metric-cell">3</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">12</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">2</td>
                        <td class="metric-cell">9</td>
                        <td class="metric-cell">6</td>
                        <td class="percentage-cell">93%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">80%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">46%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">99.89%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%</td>
                    </tr>
                    <tr class="elisafety-row">
                        <td></td>
                        <td class="year-cell">2022</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">10</td>
                        <td class="metric-cell">6</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">19</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">2</td>
                        <td class="metric-cell">12</td>
                        <td class="metric-cell">6</td>
                        <td class="percentage-cell">62%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">53%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">31%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">99.75%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%</td>
                    </tr>
                    <tr class="elisafety-row">
                        <td></td>
                        <td class="year-cell">2023</td>
                        <td class="metric-cell">2</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">5</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">5</td>
                        <td class="metric-cell">7</td>
                        <td class="metric-cell">14</td>
                        <td class="percentage-cell">93%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">80%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">46%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100.00%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%</td>
                    </tr>
                    <tr class="elisafety-row total-row">
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><strong>4</strong></td>
                        <td><strong>19</strong></td>
                        <td><strong>9</strong></td>
                        <td><strong>13</strong></td>
                        <td><strong>31</strong></td>
                        <td><strong>2</strong></td>
                        <td><strong>9</strong></td>
                        <td><strong>28</strong></td>
                        <td><strong>26</strong></td>
                        <td><strong>80%</strong></td>
                        <td><strong>68%</strong></td>
                        <td><strong>39%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>99.88%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>86%</strong></td>
                    </tr>

                    <!-- MATSFHELD -->
                    <tr class="expandable-row" onclick="toggleRows('matsfheld')">
                        <td class="company-name">
                            <span class="expand-icon" id="icon-matsfheld">⊟</span>
                            MATSFHELD
                        </td>
                        <td colspan="17"></td>
                    </tr>
                    <tr class="matsfheld-row">
                        <td></td>
                        <td class="year-cell">2021</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">3</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">7</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">8</td>
                        <td class="metric-cell">10</td>
                        <td class="percentage-cell">93%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">80%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">46%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">99.94%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%</td>
                    </tr>
                    <tr class="matsfheld-row">
                        <td></td>
                        <td class="year-cell">2022</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">6</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">5</td>
                        <td class="metric-cell">8</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">8</td>
                        <td class="metric-cell">10</td>
                        <td class="percentage-cell">62%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">53%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">31%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">99.99%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">67%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%</td>
                    </tr>
                    <tr class="matsfheld-row">
                        <td></td>
                        <td class="year-cell">2023</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">9</td>
                        <td class="metric-cell">3</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">12</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">2</td>
                        <td class="metric-cell">9</td>
                        <td class="metric-cell">6</td>
                        <td class="percentage-cell">93%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">80%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">46%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">99.61%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%</td>
                    </tr>
                    <tr class="matsfheld-row total-row">
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><strong>3</strong></td>
                        <td><strong>16</strong></td>
                        <td><strong>7</strong></td>
                        <td><strong>13</strong></td>
                        <td><strong>27</strong></td>
                        <td><strong>2</strong></td>
                        <td><strong>10</strong></td>
                        <td><strong>25</strong></td>
                        <td><strong>26</strong></td>
                        <td><strong>80%</strong></td>
                        <td><strong>68%</strong></td>
                        <td><strong>39%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>99.85%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>86%</strong></td>
                    </tr>

                    <!-- GDAP -->
                    <tr class="expandable-row" onclick="toggleRows('gdap')">
                        <td class="company-name">
                            <span class="expand-icon" id="icon-gdap">⊟</span>
                            GDAP
                        </td>
                        <td colspan="17"></td>
                    </tr>
                    <tr class="gdap-row">
                        <td></td>
                        <td class="year-cell">2021</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">10</td>
                        <td class="metric-cell">6</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">19</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">2</td>
                        <td class="metric-cell">12</td>
                        <td class="metric-cell">6</td>
                        <td class="percentage-cell">93%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">80%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">46%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">99.89%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%</td>
                    </tr>
                    <tr class="gdap-row">
                        <td></td>
                        <td class="year-cell">2022</td>
                        <td class="metric-cell">2</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">5</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">11</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">3</td>
                        <td class="metric-cell">11</td>
                        <td class="metric-cell">10</td>
                        <td class="percentage-cell">62%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">53%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">31%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">99.29%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%<span class="arrow-down">▼</span></td>
                        <td class="percentage-cell">67%</td>
                    </tr>
                    <tr class="gdap-row">
                        <td></td>
                        <td class="year-cell">2023</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">1</td>
                        <td class="metric-cell">3</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">7</td>
                        <td class="metric-cell">0</td>
                        <td class="metric-cell">4</td>
                        <td class="metric-cell">8</td>
                        <td class="metric-cell">10</td>
                        <td class="percentage-cell">93%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">80%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">46%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">99.66%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%<span class="arrow-up">▲</span></td>
                        <td class="percentage-cell">100%</td>
                    </tr>
                    <tr class="gdap-row total-row">
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><strong>4</strong></td>
                        <td><strong>15</strong></td>
                        <td><strong>14</strong></td>
                        <td><strong>12</strong></td>
                        <td><strong>37</strong></td>
                        <td><strong>1</strong></td>
                        <td><strong>9</strong></td>
                        <td><strong>31</strong></td>
                        <td><strong>26</strong></td>
                        <td><strong>80%</strong></td>
                        <td><strong>68%</strong></td>
                        <td><strong>39%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>99.61%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>86%</strong></td>
                    </tr>

                    <!-- Grand Total -->
                    <tr class="grand-total-row">
                        <td class="company-name"><strong>Total</strong></td>
                        <td></td>
                        <td><strong>11</strong></td>
                        <td><strong>50</strong></td>
                        <td><strong>30</strong></td>
                        <td><strong>38</strong></td>
                        <td><strong>95</strong></td>
                        <td><strong>5</strong></td>
                        <td><strong>28</strong></td>
                        <td><strong>84</strong></td>
                        <td><strong>78</strong></td>
                        <td><strong>80%</strong></td>
                        <td><strong>68%</strong></td>
                        <td><strong>39%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>99.78%</strong></td>
                        <td><strong>86%</strong></td>
                        <td><strong>86%</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleRows(company) {
            const rows = document.querySelectorAll('.' + company + '-row');
            const icon = document.getElementById('icon-' + company);
            
            rows.forEach(row => {
                if (row.style.display === 'none') {
                    row.style.display = '';
                    icon.textContent = '⊟';
                } else {
                    row.style.display = 'none';
                    icon.textContent = '⊞';
                }
            });
        }

        function clearFilters() {
            document.getElementById('companyFilter').value = 'all';
            document.getElementById('monthFilter').value = 'all';
            document.getElementById('quarterFilter').value = 'all';
            document.getElementById('yearFilter').value = 'all';
        }
    </script>
</body>
</html>

