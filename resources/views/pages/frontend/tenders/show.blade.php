@extends('layouts.frontend_app')
@section('title', $tender->getLocalizedTitle() . ' | ' . __('frontend.seo.site_name'))
@section('description', Str::limit($tender->getLocalizedSubject(), 155))

@section('frontent_content')
<div class="gov-page tender-page">
    {{-- Hero Section --}}
    <div class="gov-hero tender-hero">
        <div class="gov-container">
            <div class="gov-hero-content gov-animate-fade">
                <div class="tender-hero-badges">
                    @if($tender->is_urgent)
                        <div class="gov-badge tender-badge-urgent">
                            <i class="fa-solid fa-bell"></i>
                            <span>{{ __('frontend.tenders.urgent') }}</span>
                        </div>
                    @endif
                    @if($tender->isOpen())
                        <div class="gov-badge gov-badge-success">{{ __('frontend.tenders.status_active') }}</div>
                    @else
                        <div class="gov-badge gov-badge-secondary">{{ __('frontend.tenders.deadline_expired') }}</div>
                    @endif
                </div>
                <h1 class="gov-title">{{ $tender->getLocalizedTitle() }}</h1>
                <p class="gov-subtitle">{{ $tender->getLocalizedSubject() }}</p>
                <p class="tender-company">{{ $tender->customer_name }}</p>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="gov-content">
        <div class="gov-container" style="max-width: 1000px;">

            {{-- Platform Info --}}
            @if($tender->lot_url)
                <div class="gov-info-box tender-platform-info gov-animate-fade" data-delay="0.1">
                    <i class="fa-solid fa-globe"></i>
                    <div>
                        <strong>{{ __('frontend.tenders.platform') }}:</strong>
                        <p style="margin: 5px 0 0;">
                            {{ __('frontend.tenders.lot_number') }}: <strong>{{ $tender->lot_number }}</strong>
                            <br>
                            <a href="{{ $tender->lot_url }}" target="_blank" class="tender-link">
                                <i class="fa-solid fa-external-link-alt"></i> {{ $tender->lot_url }}
                            </a>
                        </p>
                    </div>
                </div>
            @endif

            {{-- Section 1: Purchase Subject --}}
            <div class="gov-card gov-animate-fade" data-delay="0.15">
                <div class="gov-card-header">
                    <div class="gov-card-number">1</div>
                    <h2 class="gov-card-title">{{ __('frontend.tenders.purchase_subject') }}</h2>
                </div>
                <div class="gov-card-body">
                    <p><strong>{{ $tender->getLocalizedSubject() }}</strong></p>
                    @if($tender->code)
                        <p class="tender-code-info">{{ __('frontend.tenders.code') }}: <strong>{{ $tender->code }}</strong></p>
                    @endif
                </div>
            </div>

            {{-- Section 2: Project Address --}}
            <div class="gov-card gov-animate-fade" data-delay="0.2">
                <div class="gov-card-header">
                    <div class="gov-card-number">2</div>
                    <h2 class="gov-card-title">{{ __('frontend.tenders.project_address') }}</h2>
                </div>
                <div class="gov-card-body">
                    <p><i class="fa-solid fa-map-marker-alt" style="color: var(--gov-primary); margin-right: 8px;"></i> <strong>{{ $tender->getLocalizedLocation() }}</strong></p>
                    @if($tender->getLocalizedLocationDescription())
                        <p style="margin-left: 24px; color: var(--gov-text-muted);">{{ $tender->getLocalizedLocationDescription() }}</p>
                    @endif
                </div>
            </div>

            {{-- Section 3: Technical Requirements --}}
            @if($tender->technical_requirements && count($tender->technical_requirements))
                <div class="gov-card gov-animate-fade" data-delay="0.25">
                    <div class="gov-card-header">
                        <div class="gov-card-number">3</div>
                        <h2 class="gov-card-title">{{ __('frontend.tenders.technical_requirements') }}</h2>
                    </div>
                    <div class="gov-card-body">
                        <ul class="tender-list">
                            @foreach($tender->technical_requirements as $req)
                                <li>{{ $req }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Section 4: Qualification Requirements --}}
            @if($tender->qualification_requirements && count($tender->qualification_requirements))
                <div class="gov-card gov-animate-fade" data-delay="0.3">
                    <div class="gov-card-header">
                        <div class="gov-card-number">{{ $tender->technical_requirements ? '4' : '3' }}</div>
                        <h2 class="gov-card-title">{{ __('frontend.tenders.qualification_requirements') }}</h2>
                    </div>
                    <div class="gov-card-body">
                        <ul class="tender-list">
                            @foreach($tender->qualification_requirements as $req)
                                <li>{{ $req }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Section: Important Dates --}}
            <div class="gov-card tender-dates-card gov-animate-fade" data-delay="0.35">
                <div class="gov-card-header">
                    <div class="gov-card-number"><i class="fa-regular fa-calendar"></i></div>
                    <h2 class="gov-card-title">{{ __('frontend.tenders.important_dates') }}</h2>
                </div>
                <div class="gov-card-body">
                    <div class="tender-dates-grid">
                        <div class="tender-date-item">
                            <div class="tender-date-icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div class="tender-date-content">
                                <span class="tender-date-label">{{ __('frontend.tenders.announcement_date') }}</span>
                                <span class="tender-date-value">{{ $tender->announcement_date->format('d.m.Y') }}</span>
                            </div>
                        </div>
                        <div class="tender-date-item {{ $tender->isExpired() ? '' : ($tender->getDaysRemaining() <= 3 ? 'tender-date-deadline' : '') }}">
                            <div class="tender-date-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="tender-date-content">
                                <span class="tender-date-label">{{ __('frontend.tenders.submission_deadline') }}</span>
                                <span class="tender-date-value">{{ $tender->submission_deadline->format('d.m.Y') }}</span>
                                @if(!$tender->isExpired())
                                    <span class="tender-days-left">{{ $tender->getDaysRemaining() }} {{ __('frontend.tenders.days_left') }}</span>
                                @else
                                    <span class="tender-expired-text">{{ __('frontend.tenders.deadline_expired') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section: Customer Information --}}
            <div class="gov-card gov-animate-fade" data-delay="0.4">
                <div class="gov-card-header">
                    <div class="gov-card-number"><i class="fa-solid fa-building"></i></div>
                    <h2 class="gov-card-title">{{ __('frontend.tenders.customer_information') }}</h2>
                </div>
                <div class="gov-card-body">
                    <div class="tender-contact-grid">
                        <div class="tender-contact-item">
                            <i class="fa-solid fa-building"></i>
                            <div>
                                <strong>{{ __('frontend.tenders.customer_name') }}</strong>
                                <p>{{ $tender->customer_name }}</p>
                            </div>
                        </div>
                        @if($tender->customer_tin)
                            <div class="tender-contact-item">
                                <i class="fa-solid fa-hashtag"></i>
                                <div>
                                    <strong>{{ __('frontend.tenders.tin') }}</strong>
                                    <p>{{ $tender->customer_tin }}</p>
                                </div>
                            </div>
                        @endif
                        @if($tender->customer_address)
                            <div class="tender-contact-item">
                                <i class="fa-solid fa-map-marker-alt"></i>
                                <div>
                                    <strong>{{ __('frontend.tenders.customer_address') }}</strong>
                                    <p>{{ $tender->customer_address }}</p>
                                </div>
                            </div>
                        @endif
                        @if($tender->customer_phone)
                            <div class="tender-contact-item">
                                <i class="fa-solid fa-phone"></i>
                                <div>
                                    <strong>{{ __('frontend.tenders.phone') }}</strong>
                                    <p>{{ $tender->customer_phone }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Download Documents Section --}}
            @if($tender->documents && count($tender->documents))
                <div class="tender-download-section gov-animate-fade" data-delay="0.45">
                    <h3 class="tender-download-title">
                        <i class="fa-solid fa-file-arrow-down"></i>
                        {{ __('frontend.tenders.download_documents') }}
                    </h3>
                    <div class="tender-download-grid">
                        @foreach($tender->documents as $doc)
                            <a href="{{ Storage::url($doc['path']) }}" target="_blank" class="tender-download-card">
                                <div class="tender-download-icon">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </div>
                                <div class="tender-download-info">
                                    <span class="tender-download-name">{{ $doc['name'] }}</span>
                                    <span class="tender-download-format">{{ number_format($doc['size'] / 1024, 1) }} KB</span>
                                </div>
                                <div class="tender-download-btn">
                                    <i class="fa-solid fa-download"></i>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Related Tenders --}}
            @if($relatedTenders->count() > 0)
                <div class="tender-related gov-animate-fade" data-delay="0.5">
                    <h3>{{ __('frontend.tenders.related_tenders') }}</h3>
                    <div class="tender-related-grid">
                        @foreach($relatedTenders as $related)
                            <a href="{{ route('frontend.tenders.show', $related->id) }}" class="tender-related-card">
                                <h4>{{ Str::limit($related->getLocalizedTitle(), 60) }}</h4>
                                <span class="tender-related-deadline">
                                    <i class="fa-solid fa-clock"></i>
                                    {{ $related->submission_deadline->format('d.m.Y') }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Back Button --}}
            <div class="tender-back gov-animate-fade" data-delay="0.55">
                <a href="{{ route('frontend.tenders.index') }}" class="gov-btn gov-btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> {{ __('frontend.tenders.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.tender-page { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
.tender-hero { padding: 70px 0 55px; }
.tender-hero-badges { display: flex; gap: 10px; margin-bottom: 15px; flex-wrap: wrap; }
.tender-badge-urgent { background: #dc2626 !important; border-color: #b91c1c !important; animation: pulse 2s infinite; }
@keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.8; } }
.tender-company { font-size: 16px; opacity: 0.85; font-weight: 600; margin-top: 12px; }
.tender-code-info { color: var(--gov-text-muted); margin: 10px 0 0; }
.tender-list { list-style: none; padding: 0; margin: 0; }
.tender-list li { position: relative; padding-left: 28px; margin-bottom: 12px; line-height: 1.6; color: #475569; }
.tender-list li::before { content: '\f00c'; font-family: 'Font Awesome 6 Free'; font-weight: 900; position: absolute; left: 0; color: var(--gov-primary-light); font-size: 14px; }
.tender-list li:last-child { margin-bottom: 0; }
.tender-link { color: var(--gov-primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; }
.tender-link:hover { text-decoration: underline; }
.tender-platform-info { margin-bottom: 25px; background: #eff6ff; }
.tender-platform-info strong { color: var(--gov-primary); }
.tender-dates-card .gov-card-header { background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-color: #fbbf24; }
.tender-dates-card .gov-card-number { background: linear-gradient(135deg, #d97706 0%, #b45309 100%); border-color: #f59e0b; }
.tender-dates-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
.tender-date-item { display: flex; align-items: center; gap: 15px; padding: 18px 20px; background: #f8fafc; border: 2px solid var(--gov-border); border-left: 4px solid var(--gov-primary); }
.tender-date-deadline { border-left-color: #f59e0b; background: #fffbeb; }
.tender-date-icon { font-size: 24px; color: var(--gov-primary); }
.tender-date-deadline .tender-date-icon { color: #d97706; }
.tender-date-content { display: flex; flex-direction: column; }
.tender-date-label { font-size: 13px; color: var(--gov-text-muted); margin-bottom: 4px; }
.tender-date-value { font-size: 18px; font-weight: 700; color: var(--gov-text-dark); }
.tender-days-left { font-size: 12px; color: #27ae60; font-weight: 600; margin-top: 4px; }
.tender-expired-text { font-size: 12px; color: #dc3545; font-weight: 600; margin-top: 4px; }
.tender-contact-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
.tender-contact-item { display: flex; align-items: flex-start; gap: 15px; padding: 18px; background: #f8fafc; border: 1px solid var(--gov-border); }
.tender-contact-item > i { font-size: 20px; color: var(--gov-primary); margin-top: 2px; }
.tender-contact-item strong { display: block; font-size: 13px; color: var(--gov-text-muted); margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.5px; }
.tender-contact-item p { margin: 0; color: var(--gov-text-dark); font-weight: 500; }
.tender-download-section { background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-dark) 100%); border: 2px solid var(--gov-primary-light); border-top: 5px solid var(--gov-primary-light); padding: 40px; margin-top: 30px; }
.tender-download-title { font-size: 24px; font-weight: 700; color: white; margin: 0 0 30px; display: flex; align-items: center; gap: 12px; }
.tender-download-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 15px; }
.tender-download-card { display: flex; align-items: center; gap: 15px; padding: 18px 20px; background: white; border: 2px solid var(--gov-border); text-decoration: none; transition: var(--gov-transition); }
.tender-download-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2); border-color: var(--gov-primary-light); }
.tender-download-icon { font-size: 32px; color: #dc2626; }
.tender-download-info { flex: 1; display: flex; flex-direction: column; }
.tender-download-name { font-weight: 600; color: var(--gov-text-dark); font-size: 14px; margin-bottom: 4px; }
.tender-download-format { font-size: 12px; color: var(--gov-text-muted); }
.tender-download-btn { width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: var(--gov-primary); color: white; font-size: 16px; transition: var(--gov-transition); }
.tender-download-card:hover .tender-download-btn { background: var(--gov-primary-light); }
.tender-related { margin-top: 40px; padding-top: 30px; border-top: 2px solid var(--gov-border); }
.tender-related h3 { font-size: 1.2rem; margin-bottom: 20px; color: var(--gov-text-dark); }
.tender-related-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px; }
.tender-related-card { padding: 20px; background: #f8fafc; border: 1px solid var(--gov-border); text-decoration: none; transition: var(--gov-transition); }
.tender-related-card:hover { border-color: var(--gov-primary); box-shadow: var(--gov-shadow); }
.tender-related-card h4 { font-size: 0.95rem; color: var(--gov-text-dark); margin: 0 0 10px; }
.tender-related-deadline { font-size: 0.85rem; color: var(--gov-text-muted); display: flex; align-items: center; gap: 5px; }
.tender-back { margin-top: 40px; text-align: center; }
@media (max-width: 768px) {
    .tender-hero { padding: 50px 0 40px; }
    .tender-dates-grid, .tender-contact-grid { grid-template-columns: 1fr; }
    .tender-download-section { padding: 25px 20px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            const delay = parseFloat(el.dataset.delay) || 0;
            gsap.fromTo(el, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.5, delay: delay, scrollTrigger: { trigger: el, start: 'top 90%' } });
        });
    }
});
</script>
@endsection
