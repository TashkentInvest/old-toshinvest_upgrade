<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi ish uchun ariza</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .email-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .email-header {
            background: linear-gradient(135deg, #2d4a6f 0%, #1e3a5f 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .email-header p {
            margin: 10px 0 0;
            opacity: 0.9;
            font-size: 14px;
        }
        .email-body {
            padding: 30px;
        }
        .info-section {
            margin-bottom: 25px;
        }
        .info-section h2 {
            color: #2d4a6f;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e5e7eb;
        }
        .info-row {
            display: flex;
            margin-bottom: 12px;
        }
        .info-label {
            font-weight: 600;
            color: #4a5568;
            min-width: 140px;
        }
        .info-value {
            color: #1a1a2e;
        }
        .message-box {
            background: #f8f9fa;
            border-left: 4px solid #2d4a6f;
            padding: 15px 20px;
            margin-top: 15px;
            border-radius: 0 8px 8px 0;
        }
        .message-box p {
            margin: 0;
            white-space: pre-wrap;
        }
        .email-footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            font-size: 13px;
            color: #718096;
            border-top: 1px solid #e5e7eb;
        }
        .badge {
            display: inline-block;
            background: #c9a962;
            color: #1a1a2e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Yangi ish uchun ariza</h1>
            <p>Tashkent Invest - Kadrlar bo'limi</p>
            <span class="badge">{{ $applicationData['position'] }}</span>
        </div>

        <div class="email-body">
            <div class="info-section">
                <h2>Shaxsiy ma'lumotlar</h2>
                <div class="info-row">
                    <span class="info-label">To'liq ism:</span>
                    <span class="info-value">{{ $applicationData['full_name'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value">{{ $applicationData['email'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Telefon:</span>
                    <span class="info-value">{{ $applicationData['phone'] }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Lavozim:</span>
                    <span class="info-value">{{ $applicationData['position'] }}</span>
                </div>
            </div>

            @if(!empty($applicationData['message']))
            <div class="info-section">
                <h2>Qo'shimcha xabar</h2>
                <div class="message-box">
                    <p>{{ $applicationData['message'] }}</p>
                </div>
            </div>
            @endif

            @if(!empty($applicationData['resume_path']))
            <div class="info-section">
                <h2>Ilova qilingan hujjatlar</h2>
                <p style="color: #4a5568;">📎 Rezyume fayli ilova qilingan</p>
            </div>
            @endif
        </div>

        <div class="email-footer">
            <p>Bu xabar {{ config('app.name') }} saytidan yuborildi</p>
            <p>Yuborilgan vaqt: {{ now()->format('d.m.Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
