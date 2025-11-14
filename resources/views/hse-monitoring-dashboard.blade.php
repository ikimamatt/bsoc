<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSE Performance Monitoring Tool - Manager Version</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 3rem;
            max-width: 1400px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header-logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .header-logo {
            height: 60px;
            width: auto;
            object-fit: contain;
        }

        .header h1 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #1565c0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .header .brand {
            color: #1976d2;
            font-weight: 800;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 3rem;
            align-items: start;
        }

        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .menu-button {
            background: white;
            border: 2px solid #424242;
            border-radius: 12px;
            padding: 1.25rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #424242;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 70px;
            line-height: 1.3;
        }

        .menu-button:hover {
            background: linear-gradient(135deg, #1565c0 0%, #1976d2 100%);
            color: white;
            border-color: #1565c0;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(21, 101, 192, 0.3);
        }

        .worker-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .worker-svg {
            width: 200px;
            height: 280px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #e0e0e0;
            color: #666;
            font-size: 0.9rem;
        }

        .version {
            font-weight: 500;
        }

        .developed-by {
            font-weight: 500;
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
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
        }

        @media (max-width: 1200px) {
            .main-content {
                grid-template-columns: 1fr;
            }
            
            .worker-icon {
                margin-top: 2rem;
            }
            
            .buttons-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .buttons-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header-logo {
                height: 50px;
            }
            
            .container {
                padding: 2rem 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .buttons-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="/" class="back-btn">
        <span style="font-size: 1.25rem;">←</span>
        <span>Back to Dashboard</span>
    </a>

    <div class="container">
        <div class="header">
            <div class="header-logo-container">
                <img src="{{ asset('images/gdap.jpg') }}" alt="GDAP Logo" class="header-logo">
                <h1><span class="brand">GDAP</span> HSE Performance Monitoring Tool - Manager Version</h1>
            </div>
        </div>

        <div class="main-content">
            <div class="buttons-grid">
                <!-- Row 1 -->
                <a href="#" class="menu-button">Getting Started</a>
                <!-- <a href="{{ route('performance-scorecard') }}" class="menu-button">Summary</a> -->
                <a href="#" class="menu-button">Summary</a>
                <a href="#" class="menu-button">HSE Statistics</a>
                <a href="{{ route('man-hours') }}" class="menu-button">Man Hours</a>

                <!-- Row 2 -->
                <a href="#" class="menu-button">Incidents</a>
                <a href="#" class="menu-button">Incident Rate</a>
                <a href="#" class="menu-button">Toolbox Talk</a>
                <a href="#" class="menu-button">Permit to Work</a>

                <!-- Row 3 -->
                <a href="#" class="menu-button">JSA/Risk<br>Assessment</a>
                <a href="#" class="menu-button">Training</a>
                <a href="#" class="menu-button">HSE Observation</a>
                <a href="#" class="menu-button">Workplace<br>Inspection Analysis</a>

                <!-- Row 4 -->
                <a href="#" class="menu-button">Equipment<br>Inspection</a>
                <a href="#" class="menu-button">Safety Walkthrough</a>
                <a href="#" class="menu-button">Unsafe<br>Act/Condition</a>
                <a href="#" class="menu-button">Internal Audit</a>

                <!-- Row 5 -->
                <a href="#" class="menu-button">External Audit</a>
                <a href="#" class="menu-button">Permit to Work<br>Audit</a>
                <a href="#" class="menu-button">NC and Corrective<br>Action</a>
                <a href="#" class="menu-button">Management Visit</a>

                <!-- Row 6 -->
                <a href="#" class="menu-button">Emergency Drill</a>
                <a href="#" class="menu-button">Safety Bulletin/Alert</a>
                <a href="#" class="menu-button">Safety Meeting</a>
                <a href="#" class="menu-button">Environmental<br>Monitoring</a>

                <!-- Row 7 -->
                <a href="#" class="menu-button">Management<br>Review</a>
                <a href="#" class="menu-button">Random Alcohol<br>Test</a>
                <a href="#" class="menu-button">Stop Work<br>Authority</a>
                <a href="#" class="menu-button">Disciplinary Action</a>
            </div>

            <div class="worker-icon">
                <!-- Worker Icon SVG -->
                <svg class="worker-svg" viewBox="0 0 200 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Hard Hat -->
                    <ellipse cx="100" cy="45" rx="45" ry="15" fill="#FFA726" opacity="0.3"/>
                    <path d="M 70 45 Q 70 20 100 20 Q 130 20 130 45 L 125 50 Q 100 55 75 50 Z" fill="#FFA726"/>
                    <rect x="95" y="15" width="10" height="8" fill="#FF9800"/>
                    
                    <!-- Head -->
                    <circle cx="100" cy="70" r="25" fill="#4FC3F7"/>
                    
                    <!-- Safety Goggles -->
                    <rect x="80" y="65" width="40" height="12" rx="6" fill="#1976D2" opacity="0.6"/>
                    
                    <!-- Body (Vest) -->
                    <path d="M 75 95 L 85 95 L 80 130 L 70 200 L 80 200 L 90 130 L 100 140 L 110 130 L 120 200 L 130 200 L 120 130 L 115 95 L 125 95 L 125 100 Q 100 115 75 100 Z" fill="#4FC3F7"/>
                    
                    <!-- High-Vis Vest Stripes -->
                    <rect x="70" y="110" width="60" height="8" fill="#FFEB3B" opacity="0.8"/>
                    <rect x="70" y="140" width="60" height="8" fill="#FFEB3B" opacity="0.8"/>
                    
                    <!-- Arms -->
                    <ellipse cx="65" cy="120" rx="8" ry="35" fill="#4FC3F7" transform="rotate(-15 65 120)"/>
                    <ellipse cx="135" cy="120" rx="8" ry="35" fill="#4FC3F7" transform="rotate(15 135 120)"/>
                    
                    <!-- Hands -->
                    <circle cx="60" cy="150" r="10" fill="#FFCA28"/>
                    <circle cx="140" cy="150" r="10" fill="#FFCA28"/>
                    
                    <!-- Tool Belt -->
                    <rect x="75" y="155" width="50" height="12" rx="2" fill="#795548"/>
                    <rect x="85" y="160" width="8" height="15" fill="#FDD835"/>
                    <rect x="107" y="160" width="8" height="15" fill="#9E9E9E"/>
                    
                    <!-- Legs -->
                    <rect x="80" y="200" width="15" height="60" rx="7" fill="#1976D2"/>
                    <rect x="105" y="200" width="15" height="60" rx="7" fill="#1976D2"/>
                    
                    <!-- Safety Boots -->
                    <ellipse cx="87.5" cy="265" rx="12" ry="8" fill="#424242"/>
                    <ellipse cx="112.5" cy="265" rx="12" ry="8" fill="#424242"/>
                    <rect x="75" y="257" width="25" height="12" rx="3" fill="#424242"/>
                    <rect x="100" y="257" width="25" height="12" rx="3" fill="#424242"/>
                    
                    <!-- Steel Toe Cap -->
                    <ellipse cx="87.5" cy="265" rx="8" ry="5" fill="#757575"/>
                    <ellipse cx="112.5" cy="265" rx="8" ry="5" fill="#757575"/>
                    
                    <!-- Clipboard in hand -->
                    <rect x="55" y="145" width="15" height="20" rx="2" fill="#EEEEEE" stroke="#616161" stroke-width="1"/>
                    <line x1="58" y1="150" x2="67" y2="150" stroke="#1976D2" stroke-width="1"/>
                    <line x1="58" y1="154" x2="67" y2="154" stroke="#1976D2" stroke-width="1"/>
                    <line x1="58" y1="158" x2="67" y2="158" stroke="#1976D2" stroke-width="1"/>
                    
                    <!-- Wrench in other hand -->
                    <rect x="136" y="145" width="4" height="25" rx="2" fill="#9E9E9E" transform="rotate(-20 138 157)"/>
                    <circle cx="138" cy="142" r="5" fill="#9E9E9E"/>
                    <path d="M 133 142 L 143 142 L 143 145 L 133 145 Z" fill="#757575"/>
                </svg>
            </div>
        </div>

        <div class="footer">
            <div class="version">Version: 1.0</div>
            <div class="developed-by">Developed by GDAP</div>
        </div>
    </div>
</body>
</html>

