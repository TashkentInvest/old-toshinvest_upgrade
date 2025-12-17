@extends('layouts.frontend_app')
@section('frontent_content')
<section class="board-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">{{ __('frontend.breadcrumb.home') }}</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">{{ __('frontend.share.title') }}</span>
            </div>
            <div class="hero-badge">
                <span class="badge-text">{{ __('frontend.share.governing_body') }}</span>
            </div>
            <h1 class="page-title">{{ __('frontend.share.title') }}</h1>
            <p class="page-subtitle">{{ __('frontend.share.subtitle') }}</p>
        </div>
    </div>
</section>
    <section class="shareholder-structure">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h2 class="section-title">{{ __('frontend.share.structure_title') }}</h2>
            </div>

            <!-- Statistics Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ __('frontend.share.issue_value') }}</div>
                    <div class="stat-divider"></div>
                    <div class="stat-description">
                        <span class="stat-label">{{ __('frontend.share.issue_volume') }}</span>
                        <span class="stat-unit">{{ __('frontend.share.million_sum') }}</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-value">{{ __('frontend.share.shares_value') }}</div>
                    <div class="stat-divider"></div>
                    <div class="stat-description">
                        <span class="stat-label">{{ __('frontend.share.shares_count') }}</span>
                        <span class="stat-unit">{{ __('frontend.share.pieces') }}</span>
                    </div>
                </div>

                <div class="stat-card featured">
                    <div class="stat-value">100%</div>
                    <div class="stat-divider"></div>
                    <div class="stat-description">
                        <span class="stat-label">{{ __('frontend.share.hokimiyat_share') }}</span>
                        <span class="stat-unit">{{ __('frontend.share.in_charter_capital') }}</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-value">1</div>
                    <div class="stat-divider"></div>
                    <div class="stat-description">
                        <span class="stat-label">{{ __('frontend.share.shareholder') }}</span>
                        <span class="stat-unit">{{ __('frontend.share.sole') }}</span>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <style>

/* Board Hero Section */
.board-hero {
    position: relative;
    padding: 80px 0 60px;
    background-color: #f8f9fa;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    opacity: 0.05;
    background-image: repeating-linear-pattern;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.9);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
}

.breadcrumb {
    margin-bottom: 20px;
    font-size: 14px;
}

.breadcrumb-link {
    color: #666;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: #333;
}

.breadcrumb-separator {
    margin: 0 10px;
    color: #999;
}

.breadcrumb-current {
    color: #333;
    font-weight: 500;
}

.hero-badge {
    display: inline-block;
    margin-bottom: 20px;
}

.badge-text {
    display: inline-block;
    padding: 8px 16px;
    background-color: #e9ecef;
    color: #495057;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 20px;
}

.page-title {
    font-size: 48px;
    font-weight: 700;
    color: #212529;
    margin-bottom: 20px;
    line-height: 1.2;
}

.page-subtitle {
    font-size: 18px;
    color: #6c757d;
    line-height: 1.6;
    margin: 0;
}

/* Board Members Section */
.board-members-section {
    padding: 80px 0;
    background-color: #ffffff;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}
        /* Shareholder Structure Section Styles */
        .shareholder-structure {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            position: relative;
        }

        .shareholder-structure::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8, #7c3aed);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 16px;
            font-family: 'Inter', sans-serif;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            font-size: 18px;
            color: #64748b;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .stat-card {
            background: white;
            padding: 40px 30px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #cbd5e1;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-card:hover::before {
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
        }

        .stat-card.featured {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            transform: scale(1.05);
        }

        .stat-card.featured::before {
            background: rgba(255, 255, 255, 0.2);
        }

        .stat-card.featured:hover {
            transform: scale(1.05) translateY(-8px);
        }

        .stat-value {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 20px;
            font-family: 'Inter', sans-serif;
            letter-spacing: -1px;
        }

        .stat-card.featured .stat-value {
            color: white;
        }

        .stat-divider {
            width: 60px;
            height: 3px;
            background: #e2e8f0;
            margin: 0 auto 20px;
            border-radius: 2px;
        }

        .stat-card.featured .stat-divider {
            background: rgba(255, 255, 255, 0.3);
        }

        .stat-description {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .stat-label {
            font-size: 16px;
            font-weight: 600;
            color: #374151;
            line-height: 1.4;
        }

        .stat-card.featured .stat-label {
            color: white;
        }

        .stat-unit {
            font-size: 14px;
            color: #64748b;
            font-weight: 400;
            font-style: italic;
        }

        .stat-card.featured .stat-unit {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Additional Information */
        .additional-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .info-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .info-card h3 {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 12px;
            font-family: 'Inter', sans-serif;
        }

        .info-card p {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .shareholder-structure {
                padding: 60px 0;
            }

            .container {
                padding: 0 16px;
            }

            .section-header {
                margin-bottom: 40px;
            }

            .section-title {
                font-size: 28px;
            }

            .section-subtitle {
                font-size: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                margin-bottom: 40px;
            }

            .stat-card {
                padding: 30px 20px;
            }

            .stat-card.featured {
                transform: none;
            }

            .stat-card.featured:hover {
                transform: translateY(-4px);
            }

            .stat-value {
                font-size: 36px;
            }

            .additional-info {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 24px;
            }

            .stat-value {
                font-size: 32px;
            }

            .stat-card {
                padding: 25px 15px;
            }
        }

        /* Animation */
        .stat-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .stat-card {
                border: 2px solid #000;
            }

            .stat-card.featured {
                border: 2px solid #fff;
            }
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            .stat-card {
                animation: none;
                transition: none;
            }

            .stat-card:hover {
                transform: none;
            }
        }
    </style>
@endsection
