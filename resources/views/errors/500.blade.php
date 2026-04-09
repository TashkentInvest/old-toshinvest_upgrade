<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Sahifa topilmadi | Tashkent Invest</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/dark_logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --gov-primary: #2d4a6f;
            --gov-primary-dark: #1e3a5f;
            --gov-gold: #c9a962;
            --gov-text-dark: #1a1a2e;
            --gov-text-body: #4a5568;
            --gov-bg-light: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-dark) 100%);
            padding: 20px;
        }

        .error-container {
            text-align: center;
            max-width: 500px;
            padding: 60px 40px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        .error-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 10px 30px rgba(45, 74, 111, 0.3);
        }

        .error-icon i {
            font-size: 48px;
            color: white;
        }

        .error-code {
            font-size: 80px;
            font-weight: 800;
            color: var(--gov-primary);
            line-height: 1;
            margin-bottom: 10px;
        }

        .error-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--gov-text-dark);
            margin-bottom: 12px;
        }

        .error-message {
            font-size: 16px;
            color: var(--gov-text-body);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .error-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-dark) 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(45, 74, 111, 0.3);
        }

        .error-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45, 74, 111, 0.4);
        }

        .error-links {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .error-links a {
            color: var(--gov-primary);
            text-decoration: none;
            font-size: 14px;
            margin: 0 12px;
            transition: color 0.3s ease;
        }

        .error-links a:hover {
            color: var(--gov-gold);
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="logo">
            <img src="{{ asset('assets/images/dark_logo.png') }}" alt="Tashkent Invest">
        </div>

        <div class="error-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>

        <div class="error-code">500</div>
        <h1 class="error-title">Server xatosi</h1>
        <p class="error-message">
          Iltimos, birozdan so‘ng qayta urinib ko‘ring yoki bosh sahifaga o‘ting.
        </p>

        <a href="{{ route('frontend.index') }}" class="error-btn">
            <i class="fas fa-home"></i>
            Bosh sahifaga qaytish
        </a>

        <div class="error-links">
            <a href="{{ route('frontend.index') }}"><i class="fas fa-home"></i> Bosh sahifa</a>
            <a href="{{ route('frontend.contact') }}"><i class="fas fa-phone"></i> Bog'lanish</a>
            <a href="{{ route('frontend.media') }}"><i class="fas fa-newspaper"></i> Yangiliklar</a>
        </div>
    </div>
</body>
</html>
