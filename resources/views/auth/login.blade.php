<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('global.login') | Tashkent Invest</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/dark_logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --gov-primary: #2d4a6f;
            --gov-primary-dark: #1e3a5f;
            --gov-primary-darkest: #0f2847;
            --gov-gold: #c9a962;
            --gov-text-dark: #1a1a2e;
            --gov-text-body: #4a5568;
            --gov-text-muted: #718096;
            --gov-border: #e2e8f0;
            --gov-bg-light: #f8f9fa;
            --gov-error: #e53e3e;
            --gov-success: #27ae60;
            --gov-radius: 12px;
            --gov-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
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
            background: linear-gradient(135deg, var(--gov-primary-darkest) 0%, var(--gov-primary) 50%, var(--gov-primary-dark) 100%);
        }

        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Left Side - Branding */
        .login-branding {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-branding::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(201, 169, 98, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .branding-content {
            text-align: center;
            z-index: 1;
            max-width: 400px;
        }

        .branding-logo {
            margin-bottom: 40px;
        }

        .branding-logo img {
            height: 80px;
            filter: brightness(0) invert(1);
        }

        .branding-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .branding-subtitle {
            font-size: 1.1rem;
            opacity: 0.85;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        .branding-features {
            text-align: left;
        }

        .branding-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px;
            opacity: 0.9;
        }

        .branding-feature i {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gov-gold);
        }

        /* Right Side - Form */
        .login-form-container {
            width: 500px;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            box-shadow: -10px 0 40px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            margin-bottom: 40px;
        }

        .login-header h1 {
            font-size: 28px;
            font-weight: 800;
            color: var(--gov-text-dark);
            margin-bottom: 8px;
        }

        .login-header p {
            color: var(--gov-text-muted);
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--gov-text-dark);
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid var(--gov-border);
            border-radius: var(--gov-radius);
            font-size: 15px;
            font-family: inherit;
            color: var(--gov-text-dark);
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gov-primary);
            box-shadow: 0 0 0 4px rgba(45, 74, 111, 0.1);
        }

        .form-input::placeholder {
            color: var(--gov-text-muted);
        }

        .form-input.is-invalid {
            border-color: var(--gov-error);
        }

        .input-group {
            position: relative;
        }

        .input-group .form-input {
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gov-text-muted);
            cursor: pointer;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--gov-primary);
        }

        .invalid-feedback {
            color: var(--gov-error);
            font-size: 13px;
            margin-top: 6px;
            display: block;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .form-check input {
            width: 18px;
            height: 18px;
            accent-color: var(--gov-primary);
            cursor: pointer;
        }

        .form-check label {
            color: var(--gov-text-body);
            font-size: 14px;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-dark) 100%);
            color: white;
            border: none;
            border-radius: var(--gov-radius);
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(45, 74, 111, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45, 74, 111, 0.4);
        }

        .login-footer {
            margin-top: 30px;
            text-align: center;
        }

        .login-footer a {
            color: var(--gov-primary);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: var(--gov-gold);
        }

        .login-footer p {
            color: var(--gov-text-muted);
            font-size: 14px;
            margin-top: 20px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: var(--gov-radius);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
        }

        .alert-success {
            background: rgba(39, 174, 96, 0.1);
            color: var(--gov-success);
            border: 1px solid rgba(39, 174, 96, 0.2);
        }

        .alert-danger {
            background: rgba(229, 62, 62, 0.1);
            color: var(--gov-error);
            border: 1px solid rgba(229, 62, 62, 0.2);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-branding {
                display: none;
            }

            .login-form-container {
                width: 100%;
                max-width: 480px;
                margin: 0 auto;
                box-shadow: var(--gov-shadow);
                border-radius: var(--gov-radius);
                margin: 20px;
            }
        }

        @media (max-width: 480px) {
            .login-form-container {
                padding: 40px 24px;
                margin: 10px;
            }

            .login-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Branding -->
        <div class="login-branding">
            <div class="branding-content">
                <div class="branding-logo">
                    <img src="{{ asset('assets/images/light_logo.png') }}" alt="Tashkent Invest">
                </div>
                <h2 class="branding-title">Tashkent Invest</h2>
                <p class="branding-subtitle">
                    Toshkent shahar investitsiyalar va tashqi savdo bosh boshqarmasi boshqaruv tizimi
                </p>
                <div class="branding-features">
                    <div class="branding-feature">
                        <i class="fas fa-shield-alt"></i>
                        <span>Xavfsiz va ishonchli tizim</span>
                    </div>
                    <div class="branding-feature">
                        <i class="fas fa-chart-line"></i>
                        <span>Real vaqtda statistika</span>
                    </div>
                    <div class="branding-feature">
                        <i class="fas fa-users"></i>
                        <span>Qulay boshqaruv paneli</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="login-form-container">
            <div class="login-header">
                <h1>@lang('global.login')</h1>
                <p>@lang('global.login_desc_wel')</p>
            </div>

            @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">@lang('global.login_email')</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="@lang('global.login_email')"
                        required
                        autocomplete="email"
                        autofocus
                    >
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">@lang('global.login_password')</label>
                    <div class="input-group">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') is-invalid @enderror"
                            placeholder="@lang('global.login_password')"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="password-icon"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">@lang('global.remember_me')</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    @lang('global.login')
                </button>
            </form>

            <div class="login-footer">


                <p>
                    <a href="{{ route('frontend.index') }}">
                        <i class="fas fa-home"></i> Bosh sahifaga qaytish
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('password-icon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
