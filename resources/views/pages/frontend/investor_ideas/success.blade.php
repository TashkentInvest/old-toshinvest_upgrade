@extends('layouts.frontend_app')

@section('content')
<div class="success-page">
    <div class="container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <h1 class="success-title">{{ __('Proposal Submitted Successfully!') }}</h1>

            <p class="success-message">
                {{ __('Thank you for submitting your investment proposal to Tashkent Invest Company.') }}
            </p>

            <div class="success-details">
                <div class="detail-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span>{{ __('Confirmation email sent to your address') }}</span>
                </div>
                <div class="detail-item">
                    <i class="fa-solid fa-clock"></i>
                    <span>{{ __('Our team will review within 5 business days') }}</span>
                </div>
                <div class="detail-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>{{ __('We will contact you via provided contact information') }}</span>
                </div>
            </div>

            @if(session('idea_id'))
            <div class="reference-number">
                <strong>{{ __('Reference Number:') }}</strong> #{{ str_pad(session('idea_id'), 6, '0', STR_PAD_LEFT) }}
            </div>
            @endif

            <div class="success-actions">
                <a href="{{ route('frontend.index') }}" class="btn-home">
                    <i class="fa-solid fa-house"></i>
                    <span>{{ __('Return to Home') }}</span>
                </a>
                <a href="{{ route('frontend.investor_ideas.create') }}" class="btn-submit-another">
                    <i class="fa-solid fa-plus"></i>
                    <span>{{ __('Submit Another Proposal') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.success-page {
    background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 60px 0;
}

.success-card {
    background: white;
    max-width: 700px;
    margin: 0 auto;
    padding: 60px 50px;
    text-align: center;
    border: 4px solid #3b82f6;
    border-top: 12px solid #1e40af;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.success-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 30px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: 5px solid #34d399;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: successPulse 2s ease-in-out infinite;
}

.success-icon i {
    font-size: 70px;
    color: white;
}

@keyframes successPulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 0 0 15px rgba(16, 185, 129, 0);
    }
}

.success-title {
    font-family: 'Roboto Slab', serif;
    font-size: 36px;
    font-weight: 900;
    color: #1e293b;
    margin: 0 0 20px;
}

.success-message {
    font-size: 18px;
    color: #475569;
    line-height: 1.6;
    margin-bottom: 40px;
}

.success-details {
    background: #f8fafc;
    border: 3px solid #e2e8f0;
    border-left: 6px solid #3b82f6;
    padding: 30px;
    margin-bottom: 30px;
    text-align: left;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 0;
    font-size: 15px;
    color: #334155;
}

.detail-item:not(:last-child) {
    border-bottom: 2px solid #e2e8f0;
}

.detail-item i {
    font-size: 24px;
    color: #3b82f6;
    width: 30px;
    text-align: center;
}

.reference-number {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    border: 3px solid #3b82f6;
    padding: 20px;
    font-size: 20px;
    font-weight: 700;
    color: #1e40af;
    margin-bottom: 40px;
    font-family: 'Roboto Slab', serif;
}

.success-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-home,
.btn-submit-another {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    font-size: 16px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s;
    border: 3px solid;
}

.btn-home {
    background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
    color: white;
    border-color: #3b82f6;
}

.btn-home:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(30, 64, 175, 0.4);
}

.btn-submit-another {
    background: white;
    color: #1e40af;
    border-color: #3b82f6;
}

.btn-submit-another:hover {
    background: #eff6ff;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .success-card {
        padding: 40px 30px;
    }

    .success-title {
        font-size: 28px;
    }

    .success-actions {
        flex-direction: column;
    }

    .btn-home,
    .btn-submit-another {
        width: 100%;
        justify-content: center;
    }
}
</style>
@endsection
