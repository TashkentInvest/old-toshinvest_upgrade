@extends('layouts.frontend_app')
@section('title', __('frontend.jac.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.jac.title')"
        :subtitle="__('frontend.jac.subtitle')"
        badge="JAC Motors"
        badgeIcon="fa-industry"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.jac.breadcrumb')]
        ]"
    />

    {{-- Timeline Section --}}
    <x-frontend.section bg="white">
        <div class="jac-container">
            <div class="jac-header">
                <h2>{{ __('frontend.jac.timeline_title') }}</h2>
                <p>{{ __('frontend.jac.timeline_subtitle') }}</p>
            </div>

            <div class="jac-cards-row">
                <div class="jac-card">
                    <div class="jac-card-top">
                        <div class="jac-icon"><i class="fa-solid fa-play"></i></div>
                        <span class="jac-tag jac-tag-green">{{ __('frontend.jac.start') }}</span>
                    </div>
                    <h3>{{ __('frontend.jac.start_title') }}</h3>
                    <div class="jac-date">26 {{ __('frontend.months.june') }} 2025</div>
                    <p>{{ __('frontend.jac.start_desc') }}</p>
                </div>
                <div class="jac-card">
                    <div class="jac-card-top">
                        <div class="jac-icon"><i class="fa-solid fa-flag-checkered"></i></div>
                        <span class="jac-tag jac-tag-gold">{{ __('frontend.jac.finish') }}</span>
                    </div>
                    <h3>{{ __('frontend.jac.end_title') }}</h3>
                    <div class="jac-date">2 {{ __('frontend.months.july') }} 2025 <span class="jac-time">{{ __('frontend.jac.until') }} 16:00</span></div>
                    <p>{{ __('frontend.jac.end_desc') }}</p>
                </div>
            </div>
        </div>
    </x-frontend.section>

    {{-- Project Info Section --}}
    <x-frontend.section bg="light">
        <div class="jac-container">
            <div class="jac-cards-row">
                <div class="jac-card">
                    <div class="jac-card-top">
                        <div class="jac-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <h3>{{ __('frontend.jac.location_title') }}</h3>
                    </div>
                    <div class="jac-info-row">
                        <i class="fa-solid fa-building"></i>
                        <div>
                            <span class="jac-label">{{ __('frontend.jac.project_address') }}</span>
                            <span class="jac-value">{{ __('frontend.jac.address_value') }}</span>
                        </div>
                    </div>
                </div>

                <div class="jac-card">
                    <div class="jac-card-top">
                        <div class="jac-icon"><i class="fa-solid fa-address-book"></i></div>
                        <h3>{{ __('frontend.jac.contact_title') }}</h3>
                    </div>
                    <div class="jac-info-grid">
                        <div class="jac-info-row">
                            <i class="fa-solid fa-user"></i>
                            <div>
                                <span class="jac-label">{{ __('frontend.jac.responsible_person') }}</span>
                                <span class="jac-value">Aziz Ataullayev</span>
                            </div>
                        </div>
                        <div class="jac-info-row">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <span class="jac-label">{{ __('frontend.contact.phone') }}</span>
                                <span class="jac-value">+998 90 601 22 44</span>
                            </div>
                        </div>
                        <div class="jac-info-row">
                            <i class="fa-solid fa-envelope"></i>
                            <div>
                                <span class="jac-label">{{ __('frontend.contact.email') }}</span>
                                <span class="jac-value">aziz.ataullayev@jacmotors.uz</span>
                            </div>
                        </div>
                        <div class="jac-info-row">
                            <i class="fa-solid fa-at"></i>
                            <div>
                                <span class="jac-label">{{ __('frontend.jac.additional_email') }}</span>
                                <span class="jac-value">aziz.erkinovich@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.section>

    {{-- Documents Section --}}
    <x-frontend.section bg="white">
        <div class="jac-container">
            <div class="jac-header">
                <h2>{{ __('frontend.jac.documents_title') }}</h2>
                <p>{{ __('frontend.jac.documents_subtitle') }}</p>
            </div>

            <div class="jac-docs-grid">
                <div class="jac-doc-item">
                    <div class="jac-doc-icon"><i class="fa-solid fa-file-lines"></i><span>PDF</span></div>
                    <div class="jac-doc-info">
                        <span class="jac-doc-name">{{ __('frontend.jac.doc_technical') }}</span>
                        <span class="jac-doc-type">{{ __('frontend.jac.doc_spec') }}</span>
                    </div>
                    <span class="jac-check"><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="jac-doc-item">
                    <div class="jac-doc-icon"><i class="fa-solid fa-map"></i><span>PDF</span></div>
                    <div class="jac-doc-info">
                        <span class="jac-doc-name">{{ __('frontend.jac.doc_masterplan') }}</span>
                        <span class="jac-doc-type">{{ __('frontend.jac.doc_layout') }}</span>
                    </div>
                    <span class="jac-check"><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="jac-doc-item">
                    <div class="jac-doc-icon"><i class="fa-solid fa-drafting-compass"></i><span>PDF</span></div>
                    <div class="jac-doc-info">
                        <span class="jac-doc-name">{{ __('frontend.jac.doc_sketch') }}</span>
                        <span class="jac-doc-type">{{ __('frontend.jac.doc_preliminary') }}</span>
                    </div>
                    <span class="jac-check"><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="jac-doc-item">
                    <div class="jac-doc-icon"><i class="fa-solid fa-building-columns"></i><span>PDF</span></div>
                    <div class="jac-doc-info">
                        <span class="jac-doc-name">{{ __('frontend.jac.doc_apz') }}</span>
                        <span class="jac-doc-type">{{ __('frontend.jac.doc_technical_task') }}</span>
                    </div>
                    <span class="jac-check"><i class="fa-solid fa-check"></i></span>
                </div>
            </div>
        </div>
    </x-frontend.section>

    {{-- Company Section --}}
    <x-frontend.section bg="light">
        <div class="jac-container">
            <div class="jac-header">
                <h2>{{ __('frontend.jac.company_title') }}</h2>
                <p>{{ __('frontend.jac.company_subtitle') }}</p>
            </div>

            <div class="jac-card jac-card-full">
                <div class="jac-card-top">
                    <div class="jac-icon"><i class="fa-solid fa-car"></i></div>
                    <div>
                        <h3>OOO SP "JAC MOTORS TOSHKENT"</h3>
                        <p class="jac-subtitle">{{ __('frontend.jac.company_desc') }}</p>
                    </div>
                </div>
                <div class="jac-company-grid">
                    <div class="jac-info-row">
                        <i class="fa-solid fa-id-card"></i>
                        <div>
                            <span class="jac-label">{{ __('frontend.jac.inn') }}</span>
                            <span class="jac-value">312120889</span>
                        </div>
                    </div>
                    <div class="jac-info-row">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <span class="jac-label">{{ __('frontend.jac.legal_address') }}</span>
                            <span class="jac-value">{{ __('frontend.jac.legal_address_value') }}</span>
                        </div>
                    </div>
                    <div class="jac-info-row">
                        <i class="fa-solid fa-map-pin"></i>
                        <div>
                            <span class="jac-label">{{ __('frontend.jac.object_address') }}</span>
                            <span class="jac-value">{{ __('frontend.jac.object_address_value') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.section>

    {{-- Download Section --}}
    <x-frontend.section bg="white">
        <div class="jac-container">
            <div class="jac-header">
                <h2>{{ __('frontend.jac.download_title') }}</h2>
                <p>{{ __('frontend.jac.download_desc') }}</p>
            </div>

            <div class="jac-download-grid">
                <div class="jac-download-card">
                    <div class="jac-download-header">
                        <div class="jac-doc-icon"><i class="fa-solid fa-file-pdf"></i><span>PDF</span></div>
                        <div>
                            <h4>{{ __('frontend.jac.download_announcement') }}</h4>
                            <p>{{ __('frontend.jac.doc_spec') }}</p>
                        </div>
                    </div>
                    <div class="jac-download-footer">
                        <a style="color: #fff" href="{{ asset('investment-projects/JAC_СМР конкурс эълони.pdf') }}" target="_blank" class="jac-btn jac-btn-primary">
                            <i class="fa-solid fa-eye"></i> {{ __('frontend.common.open') }}
                        </a>
                        <a href="{{ asset('investment-projects/JAC_СМР конкурс эълони.pdf') }}" download class="jac-btn jac-btn-secondary">
                            <i class="fa-solid fa-download"></i> {{ __('frontend.common.download') }}
                        </a>
                    </div>
                </div>
                <div class="jac-download-card">
                    <div class="jac-download-header">
                        <div class="jac-doc-icon jac-doc-icon-zip"><i class="fa-solid fa-file-zipper"></i><span>RAR</span></div>
                        <div>
                            <h4>{{ __('frontend.jac.download_attachments') }}</h4>
                            <p>{{ __('frontend.jac.feature_3') }}</p>
                        </div>
                    </div>
                    <div class="jac-download-footer">
                        <a style="color: #fff" href="{{ asset('investment-projects/JAC MT.rar') }}" download class="jac-btn jac-btn-primary">
                            <i class="fa-solid fa-download"></i> {{ __('frontend.common.download') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-frontend.section>
</div>

<style>
.jac-container { max-width: 1000px; margin: 0 auto; }

.jac-header { text-align: center; margin-bottom: 32px; }
.jac-header h2 { font-size: 1.75rem; font-weight: 700; color: #1a1a1a; margin: 0 0 8px; }
.jac-header p { font-size: 1rem; color: #64748b; margin: 0; }

.jac-cards-row { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; align-items: stretch; }

.jac-card {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    border: 1px solid #e9ecef;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.jac-card-full { max-width: 800px; margin: 0 auto; }

.jac-card-top { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
.jac-card-top h3 { margin: 0; font-size: 1.1rem; color: #1a1a1a; }
.jac-subtitle { margin: 4px 0 0; color: #64748b; font-size: 0.9rem; }

.jac-icon {
    width: 44px; height: 44px;
    background: #2d4a6f; color: #fff;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0;
}

.jac-tag {
    padding: 4px 12px; border-radius: 20px;
    font-size: 0.75rem; font-weight: 600; text-transform: uppercase;
}
.jac-tag-green { background: #d1fae5; color: #065f46; }
.jac-tag-gold { background: #fef3c7; color: #92400e; }

.jac-card h3 { font-size: 1rem; color: #1a1a1a; margin: 0 0 8px; }
.jac-card p { color: #64748b; font-size: 0.9rem; margin: 12px 0 0; line-height: 1.5; }

.jac-date { font-size: 1.25rem; font-weight: 700; color: #2d4a6f; }
.jac-time { font-size: 0.9rem; font-weight: 600; color: #c9a962; margin-left: 8px; }

.jac-info-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
.jac-company-grid { display: grid; gap: 16px; margin-top: 20px; padding-top: 20px; border-top: 1px solid #e9ecef; }

.jac-info-row { display: flex; gap: 12px; align-items: flex-start; }
.jac-info-row > i {
    width: 32px; height: 32px;
    background: #f1f5f9; color: #2d4a6f;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.85rem; flex-shrink: 0;
}
.jac-label { display: block; font-size: 0.75rem; color: #64748b; text-transform: uppercase; margin-bottom: 2px; }
.jac-value { display: block; font-weight: 600; color: #1a1a1a; font-size: 0.9rem; }

/* Documents */
.jac-docs-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }

.jac-doc-item {
    display: flex; align-items: center; gap: 14px;
    background: #fff; padding: 16px 20px;
    border-radius: 10px; border: 1px solid #e9ecef;
}

.jac-doc-icon {
    width: 48px; height: 56px; min-width: 48px;
    background: #fff; border: 1px solid #e9ecef;
    border-radius: 8px;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 2px;
}
.jac-doc-icon i { font-size: 1.25rem; color: #dc2626; }
.jac-doc-icon span { font-size: 0.6rem; font-weight: 700; color: #dc2626; }

.jac-doc-info { flex: 1; }
.jac-doc-name { display: block; font-weight: 600; color: #1a1a1a; font-size: 0.9rem; margin-bottom: 2px; }
.jac-doc-type { display: block; font-size: 0.8rem; color: #64748b; }

.jac-check {
    width: 24px; height: 24px;
    background: #10b981; color: #fff;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.7rem;
}

/* Download Cards */
.jac-download-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; }

.jac-download-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    border: 1px solid #e9ecef; overflow: hidden;
}

.jac-download-header {
    display: flex; align-items: center; gap: 16px;
    padding: 20px; background: linear-gradient(135deg, #2d4a6f 0%, #1e3654 100%);
}
.jac-download-header .jac-doc-icon { background: #fff; border: none; }
.jac-download-header h4 { margin: 0 0 4px; color: #fff; font-size: 1rem; }
.jac-download-header p { margin: 0; color: rgba(255,255,255,0.7); font-size: 0.85rem; }

.jac-doc-icon-zip i { color: #f97316; }
.jac-doc-icon-zip span { color: #f97316; }

.jac-download-footer { padding: 16px 20px; display: flex; gap: 10px; }

.jac-btn {
    flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px;
    padding: 12px 16px; border-radius: 8px;
    font-size: 0.9rem; font-weight: 600; text-decoration: none;
    transition: all 0.2s;
}
.jac-btn-primary { background: #2d4a6f; color: #fff; }
.jac-btn-primary:hover { background: #1e3654; color: #fff; }
.jac-btn-secondary { background: #f1f5f9; color: #2d4a6f; border: 1px solid #dee2e6; }
.jac-btn-secondary:hover { background: #e9ecef; color: #2d4a6f; }

@media (max-width: 768px) {
    .jac-cards-row, .jac-docs-grid, .jac-download-grid { grid-template-columns: 1fr; }
    .jac-info-grid { grid-template-columns: 1fr; }
    .jac-download-footer { flex-direction: column; }
    .jac-card { height: auto; }
}
</style>
@endsection
