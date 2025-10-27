<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HSE Report Form</title>
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
            padding: 2rem;
            color: #1e293b;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .form-content {
            padding: 2.5rem;
        }

        .form-section {
            margin-bottom: 2.5rem;
            padding: 2rem;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 12px;
            border: 2px solid #e2e8f0;
        }

        .form-section h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #3b82f6;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .table-wrapper {
            overflow-x: auto;
            margin-top: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        table th {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 0.875rem;
            text-align: left;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        table td {
            padding: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
        }

        table tbody tr:hover {
            background: #f8fafc;
        }

        table input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 0.875rem;
        }

        table input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .submit-section {
            display: flex;
            gap: 1rem;
            justify-content: center;
            padding: 2rem;
            background: #f8fafc;
            border-top: 2px solid #e2e8f0;
        }

        .btn {
            padding: 1rem 3rem;
            font-size: 1.125rem;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(100, 116, 139, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(100, 116, 139, 0.5);
        }

        .refresh-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .refresh-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .success-message {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 HSE Report Data Entry Form</h1>
            <p>Fill in the HSE report details below. Random values are pre-filled - refresh to generate new values.</p>
        </div>

        <div class="form-content">
            <button type="button" class="refresh-btn" onclick="location.reload()">🔄 Refresh Random Values</button>

            @if(session('success'))
                <div class="success-message">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('hse-report.store') }}" method="POST">
                @csrf

                <!-- Basic Information -->
                <div class="form-section">
                    <h2>📊 Basic Information</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="month">Month</label>
                            <input type="text" id="month" name="month" value="{{ $randomMonth }}" required>
                        </div>
                        <div class="form-group">
                            <label for="project_start_date">Project Start Date</label>
                            <input type="date" id="project_start_date" name="project_start_date" value="{{ now()->subDays(rand(100, 500))->format('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="days_completed">Days Completed</label>
                            <input type="number" id="days_completed" name="days_completed" value="{{ rand(100, 500) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="scope_of_works">Scope of Works</label>
                            <input type="text" id="scope_of_works" name="scope_of_works" value="{{ ['Construction & Installation', 'Maintenance & Operations', 'Drilling Operations', 'Well Services', 'Pipeline Construction'][rand(0, 4)] }}">
                        </div>
                    </div>
                </div>

                <!-- Manhours & Personnel -->
                <div class="form-section">
                    <h2>👷 Manhours & Personnel</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="total_manhours">Total Manhours</label>
                            <input type="number" id="total_manhours" name="total_manhours" value="{{ rand(50000, 200000) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="total_manhours_with_lti">Total Manhours with LTI</label>
                            <input type="number" id="total_manhours_with_lti" name="total_manhours_with_lti" value="{{ rand(50000, 200000) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="persons_inducted">Persons Inducted</label>
                            <input type="number" id="persons_inducted" name="persons_inducted" value="{{ rand(200, 800) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Training & Development -->
                <div class="form-section">
                    <h2>📚 Training & Development</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="training_conducted">Training Conducted (Sessions)</label>
                            <input type="number" id="training_conducted" name="training_conducted" value="{{ rand(15, 50) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="training_hours">Training Hours</label>
                            <input type="number" id="training_hours" name="training_hours" value="{{ rand(100, 500) }}" required>
                        </div>
                    </div>
                </div>

                <!-- HSE Activities -->
                <div class="form-section">
                    <h2>🔍 HSE Activities</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="hse_observations">HSE Observations</label>
                            <input type="number" id="hse_observations" name="hse_observations" value="{{ rand(500, 2000) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="hse_meeting">HSE Meetings</label>
                            <input type="number" id="hse_meeting" name="hse_meeting" value="{{ rand(5, 20) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="permit_to_work">Permit to Work</label>
                            <input type="number" id="permit_to_work" name="permit_to_work" value="{{ rand(40, 150) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="knowledge_share">Knowledge Share Sessions</label>
                            <input type="number" id="knowledge_share" name="knowledge_share" value="{{ rand(3, 15) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="leadership_tour">Leadership Tours</label>
                            <input type="number" id="leadership_tour" name="leadership_tour" value="{{ rand(2, 10) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="audit">Audits Conducted</label>
                            <input type="number" id="audit" name="audit" value="{{ rand(1, 8) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Incidents & KPIs -->
                <div class="form-section">
                    <h2>⚠️ Incidents & KPIs</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="accident_incident">Accident/Incident</label>
                            <input type="number" id="accident_incident" name="accident_incident" value="{{ rand(0, 3) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="trcf">TRCF (Total Reportable Case Frequency)</label>
                            <input type="number" step="0.01" id="trcf" name="trcf" value="{{ number_format(rand(0, 50) / 10, 2, '.', '') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ltifr">LTIFR (Lost Time Injury Frequency Rate)</label>
                            <input type="number" step="0.01" id="ltifr" name="ltifr" value="{{ number_format(rand(0, 50) / 10, 2, '.', '') }}" required>
                        </div>
                    </div>
                </div>

                <!-- HSE Leading Indicators -->
                <div class="form-section">
                    <h2>📈 HSE Leading Indicators</h2>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>{{ $randomMonth }}</th>
                                    <th>YTD</th>
                                    <th>ITD</th>
                                </tr>
                            </thead>
                            <tbody id="leading_indicators_table">
                                @php
                                    $leadingIndicators = [
                                        '#Project HSE SLT',
                                        '#Project HSE Meeting & Workshop',
                                        '#Project HSE Coordination Meeting',
                                        '#Near Miss Report',
                                        '#Emergency Drill'
                                    ];
                                @endphp
                                @foreach($leadingIndicators as $indicator)
                                <tr>
                                    <td>{{ $indicator }}</td>
                                    <td><input type="number" name="leading_indicators[{{ $loop->index }}][oct25]" value="{{ rand(1, 50) }}"></td>
                                    <td><input type="number" name="leading_indicators[{{ $loop->index }}][ytd]" value="{{ rand(10, 200) }}"></td>
                                    <td><input type="number" name="leading_indicators[{{ $loop->index }}][itd]" value="{{ rand(50, 500) }}"></td>
                                    <input type="hidden" name="leading_indicators[{{ $loop->index }}][description]" value="{{ $indicator }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- HSE Lagging Indicators -->
                <div class="form-section">
                    <h2>📉 HSE Lagging Indicators</h2>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>{{ $randomMonth }}</th>
                                    <th>YTD</th>
                                    <th>ITD</th>
                                </tr>
                            </thead>
                            <tbody id="lagging_indicators_table">
                                @php
                                    $laggingIndicators = [
                                        'Fatalities',
                                        'Permanent Total Disability',
                                        'Permanent Partial Disability',
                                        'Lost Workday Case (Injuries)',
                                        'Lost Workday Case (Occupational illness)',
                                        'Restricted Workday Case',
                                        'Medical Treatment Cases',
                                        'Serious Dangerous Occurrences',
                                        'Equipment/Property Damage Incidents',
                                        'First Aid Cases',
                                        'Near Misses',
                                        'Environmental Incident',
                                        'Non-Compliance Report',
                                        'Disciplinary Actions'
                                    ];
                                @endphp
                                @foreach($laggingIndicators as $indicator)
                                <tr>
                                    <td>{{ $indicator }}</td>
                                    <td><input type="number" name="lagging_indicators[{{ $loop->index }}][oct25]" value="{{ rand(0, 5) }}"></td>
                                    <td><input type="number" name="lagging_indicators[{{ $loop->index }}][ytd]" value="{{ rand(0, 25) }}"></td>
                                    <td><input type="number" name="lagging_indicators[{{ $loop->index }}][itd]" value="{{ rand(0, 100) }}"></td>
                                    <input type="hidden" name="lagging_indicators[{{ $loop->index }}][description]" value="{{ $indicator }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- HSE Deliverables Status -->
                <div class="form-section">
                    <h2>📝 HSE Deliverables Status</h2>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Revision</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $deliverables = [
                                        'HSE Plan',
                                        'Project Emergency Plan',
                                        'Lifting Operation Plan',
                                        'Fire Protection and Prevention Plan',
                                        'Project Security Plan',
                                        'Traffic Management and Logistics Plan',
                                        'Welfare Management Plan',
                                        'Electrical Safety Management Plan',
                                        'Environmental Management Plan',
                                        'Working at Height Plan'
                                    ];
                                    $statuses = ['Approved', 'Under Review', 'Draft', 'Submitted'];
                                @endphp
                                @foreach($deliverables as $deliverable)
                                <tr>
                                    <td>{{ $deliverable }}</td>
                                    <td>
                                        <select name="deliverables_status[{{ $loop->index }}][status]">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}" {{ $statuses[array_rand($statuses)] == $status ? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="deliverables_status[{{ $loop->index }}][rev]" value="Rev {{ rand(0, 5) }}"></td>
                                    <input type="hidden" name="deliverables_status[{{ $loop->index }}][description]" value="{{ $deliverable }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Permit to Work Statistics -->
                <div class="form-section">
                    <h2>🛡️ Permit to Work Statistics</h2>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>{{ $randomMonth }}</th>
                                    <th>YTD</th>
                                    <th>ITD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $permits = [
                                        'Lifting Operation',
                                        'Breaking Ground',
                                        'Confined Space',
                                        'Working at Height',
                                        'Hot Works'
                                    ];
                                @endphp
                                @foreach($permits as $permit)
                                <tr>
                                    <td>{{ $permit }}</td>
                                    <td><input type="number" name="permit_to_work_stats[{{ $loop->index }}][oct25]" value="{{ rand(5, 50) }}"></td>
                                    <td><input type="number" name="permit_to_work_stats[{{ $loop->index }}][ytd]" value="{{ rand(50, 300) }}"></td>
                                    <td><input type="number" name="permit_to_work_stats[{{ $loop->index }}][itd]" value="{{ rand(100, 1000) }}"></td>
                                    <input type="hidden" name="permit_to_work_stats[{{ $loop->index }}][description]" value="{{ $permit }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- HSE Achievement -->
                <div class="form-section">
                    <h2>🏆 HSE Achievement</h2>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th>Icon</th>
                                    <th>{{ $randomMonth }}</th>
                                    <th>ITD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $achievements = [
                                        ['icon' => 'crane', 'label' => 'Lifting (Ton)'],
                                        ['icon' => 'excavator', 'label' => 'Excavation (M³)'],
                                        ['icon' => 'concrete', 'label' => 'Concrete (M³)'],
                                        ['icon' => 'dump_truck', 'label' => 'Filling (M²)'],
                                        ['icon' => 'vehicle', 'label' => 'Vehicle (Km)']
                                    ];
                                @endphp
                                @foreach($achievements as $achievement)
                                <tr>
                                    <td>{{ $achievement['label'] }}</td>
                                    <td><input type="text" name="hse_achievement[{{ $loop->index }}][icon]" value="{{ $achievement['icon'] }}" readonly></td>
                                    <td><input type="number" name="hse_achievement[{{ $loop->index }}][oct25]" value="{{ rand(100, 5000) }}"></td>
                                    <td><input type="number" name="hse_achievement[{{ $loop->index }}][itd]" value="{{ rand(1000, 50000) }}"></td>
                                    <input type="hidden" name="hse_achievement[{{ $loop->index }}][label]" value="{{ $achievement['label'] }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Additional HSE Data -->
                <div class="form-section">
                    <h2>➕ Additional HSE Data</h2>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>{{ $randomMonth }}</th>
                                    <th>YTD</th>
                                    <th>ITD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $additionalData = [
                                        'HSE Innovations',
                                        'HSE Campaign',
                                        'Workers Feedback',
                                        'HSE Emergency Drill'
                                    ];
                                @endphp
                                @foreach($additionalData as $data)
                                <tr>
                                    <td>{{ $data }}</td>
                                    <td><input type="number" name="additional_hse_data[{{ $loop->index }}][oct25]" value="{{ rand(1, 20) }}"></td>
                                    <td><input type="number" name="additional_hse_data[{{ $loop->index }}][ytd]" value="{{ rand(10, 100) }}"></td>
                                    <td><input type="number" name="additional_hse_data[{{ $loop->index }}][itd]" value="{{ rand(50, 500) }}"></td>
                                    <input type="hidden" name="additional_hse_data[{{ $loop->index }}][description]" value="{{ $data }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="submit-section">
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='/'">Cancel</button>
                    <button type="submit" class="btn btn-primary">💾 Submit Report</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Convert array inputs to JSON before submit
        document.querySelector('form').addEventListener('submit', function(e) {
            // Process leading indicators
            const leadingIndicators = [];
            document.querySelectorAll('#leading_indicators_table tr').forEach((row, index) => {
                const cells = row.querySelectorAll('input');
                if (cells.length > 0) {
                    leadingIndicators.push({
                        description: cells[3].value,
                        oct25: cells[0].value || '',
                        ytd: cells[1].value || '',
                        itd: cells[2].value || ''
                    });
                }
            });
            
            // Create hidden input for JSON data
            const leadingInput = document.createElement('input');
            leadingInput.type = 'hidden';
            leadingInput.name = 'leading_indicators';
            leadingInput.value = JSON.stringify(leadingIndicators);
            this.appendChild(leadingInput);
            
            // Remove original inputs
            document.querySelectorAll('input[name^="leading_indicators["]').forEach(input => {
                if (input.type !== 'hidden' || !input.name.includes('[description]')) {
                    input.remove();
                }
            });
            
            // Process lagging indicators
            const laggingIndicators = [];
            document.querySelectorAll('#lagging_indicators_table tr').forEach((row, index) => {
                const cells = row.querySelectorAll('input');
                if (cells.length > 0) {
                    laggingIndicators.push({
                        description: cells[3].value,
                        oct25: cells[0].value || '',
                        ytd: cells[1].value || '',
                        itd: cells[2].value || ''
                    });
                }
            });
            
            const laggingInput = document.createElement('input');
            laggingInput.type = 'hidden';
            laggingInput.name = 'lagging_indicators';
            laggingInput.value = JSON.stringify(laggingIndicators);
            this.appendChild(laggingInput);
            
            document.querySelectorAll('input[name^="lagging_indicators["]').forEach(input => {
                if (input.type !== 'hidden' || !input.name.includes('[description]')) {
                    input.remove();
                }
            });
            
            // Process deliverables
            const deliverables = [];
            document.querySelectorAll('select[name^="deliverables_status"]').forEach((select, index) => {
                const row = select.closest('tr');
                deliverables.push({
                    description: row.querySelector('input[type="hidden"]').value,
                    status: select.value,
                    rev: row.querySelector('input[type="text"]').value
                });
            });
            
            const deliverablesInput = document.createElement('input');
            deliverablesInput.type = 'hidden';
            deliverablesInput.name = 'deliverables_status';
            deliverablesInput.value = JSON.stringify(deliverables);
            this.appendChild(deliverablesInput);
            
            document.querySelectorAll('select[name^="deliverables_status["]').forEach(input => input.remove());
            document.querySelectorAll('input[name^="deliverables_status["]').forEach(input => input.remove());
            
            // Process permit to work stats
            const permits = [];
            document.querySelectorAll('input[name^="permit_to_work_stats["]').forEach((input, index) => {
                if (input.name.includes('[description]')) {
                    const row = input.closest('tr');
                    const inputs = row.querySelectorAll('input[type="number"]');
                    permits.push({
                        description: input.value,
                        oct25: inputs[0].value || '',
                        ytd: inputs[1].value || '',
                        itd: inputs[2].value || ''
                    });
                }
            });
            
            const permitsInput = document.createElement('input');
            permitsInput.type = 'hidden';
            permitsInput.name = 'permit_to_work_stats';
            permitsInput.value = JSON.stringify(permits);
            this.appendChild(permitsInput);
            
            document.querySelectorAll('input[name^="permit_to_work_stats["]').forEach(input => input.remove());
            
            // Process achievements
            const achievements = [];
            document.querySelectorAll('input[name^="hse_achievement["]').forEach((input, index) => {
                if (input.name.includes('[label]')) {
                    const row = input.closest('tr');
                    const inputs = row.querySelectorAll('input');
                    achievements.push({
                        icon: inputs[0].value,
                        label: input.value,
                        oct25: inputs[1].value || '',
                        itd: inputs[2].value || ''
                    });
                }
            });
            
            const achievementsInput = document.createElement('input');
            achievementsInput.type = 'hidden';
            achievementsInput.name = 'hse_achievement';
            achievementsInput.value = JSON.stringify(achievements);
            this.appendChild(achievementsInput);
            
            document.querySelectorAll('input[name^="hse_achievement["]').forEach(input => input.remove());
            
            // Process additional data
            const additionalData = [];
            document.querySelectorAll('input[name^="additional_hse_data["]').forEach((input, index) => {
                if (input.name.includes('[description]')) {
                    const row = input.closest('tr');
                    const inputs = row.querySelectorAll('input[type="number"]');
                    additionalData.push({
                        description: input.value,
                        oct25: inputs[0].value || '',
                        ytd: inputs[1].value || '',
                        itd: inputs[2].value || ''
                    });
                }
            });
            
            const additionalInput = document.createElement('input');
            additionalInput.type = 'hidden';
            additionalInput.name = 'additional_hse_data';
            additionalInput.value = JSON.stringify(additionalData);
            this.appendChild(additionalInput);
            
            document.querySelectorAll('input[name^="additional_hse_data["]').forEach(input => input.remove());
        });
    </script>
</body>
</html>

