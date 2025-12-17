@extends('layouts.frontend_app')
@section('title', __('frontend.internal_docs.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.internal_docs.title')"
        :subtitle="__('frontend.internal_docs.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-folder-open"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.internal_docs.title')]
        ]"
    />

    <x-frontend.section bg="white">
        @php
            $folderPath = public_path('assets/jamiyat_ichki_xujjatlari');
            $files = [];
            if (is_dir($folderPath)) {
                $allFiles = scandir($folderPath);
                foreach ($allFiles as $file) {
                    if ($file !== '.' && $file !== '..' && is_file($folderPath . '/' . $file)) {
                        $files[] = $file;
                    }
                }
            }
            sort($files);

            $fileNames = [
                'анкета_карточка_юр.лица_АО_КТИ_и_Хокимията_г.Ташкента.pdf' => __('frontend.internal_docs.doc_1'),
                'внтр_аудит.pdf' => __('frontend.internal_docs.doc_2'),
                'дивидендной_политике.pdf' => __('frontend.internal_docs.doc_3'),
                'комитет_по_стратегии_и_инвестициям.pdf' => __('frontend.internal_docs.doc_4'),
                'о_внутреннем_контроле.pdf' => __('frontend.internal_docs.doc_5'),
                'о_командировках_сотрудников.pdf' => __('frontend.internal_docs.doc_6'),
                'о_комитете_по_аудиту_НС.pdf' => __('frontend.internal_docs.doc_7'),
                'о_корпаративном_консультанте.pdf' => __('frontend.internal_docs.doc_8'),
                'Об_оказании_благотворительной_и_спонсорской_помощи.pdf' => __('frontend.internal_docs.doc_9'),
                'о_НС_2023.pdf' => __('frontend.internal_docs.doc_10'),
                'о_НС_2024.pdf' => __('frontend.internal_docs.doc_11'),
                'о_порядке_выплаты_вознаграждений_и_компенсаций_членам_НС.pdf' => __('frontend.internal_docs.doc_12'),
                'о_порядке_действий_при_конфликте_интересов.pdf' => __('frontend.internal_docs.doc_13'),
                'об_информационной_политике.pdf' => __('frontend.internal_docs.doc_14'),
                'об_исполнительном_органе.pdf' => __('frontend.internal_docs.doc_15'),
                'по_корпоративной_этике.pdf' => __('frontend.internal_docs.doc_16'),
                'по_противодействию_коррупции.pdf' => __('frontend.internal_docs.doc_17'),
                'положение_об_ИО.pdf' => __('frontend.internal_docs.doc_18'),
                'положение_об_ОСА.pdf' => __('frontend.internal_docs.doc_19'),
            ];

            $totalSize = 0;
            foreach ($files as $file) {
                $fp = $folderPath . '/' . $file;
                if (file_exists($fp)) $totalSize += filesize($fp);
            }
        @endphp

        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-body">
                <div class="gov-table-container">
                    <table class="gov-table">
                        <thead>
                            <tr>
                                <th style="width: 60px;">№</th>
                                <th>{{ __('frontend.common.document_name') }}</th>
                                <th style="width: 100px;">{{ __('frontend.common.size') }}</th>
                                <th style="width: 120px;">{{ __('frontend.common.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $index => $file)
                                @php
                                    $filePath = $folderPath . '/' . $file;
                                    $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                    $formattedSize = $fileSize >= 1048576 ? number_format($fileSize / 1048576, 1) . ' MB' : number_format($fileSize / 1024, 1) . ' KB';
                                    $displayName = $fileNames[$file] ?? pathinfo($file, PATHINFO_FILENAME);
                                @endphp
                                <tr class="gov-animate-fade" data-delay="{{ ($index * 0.05) + 0.2 }}">
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $displayName }}</strong>
                                        <br><small class="text-muted">{{ $file }}</small>
                                    </td>
                                    <td class="text-center text-muted">{{ $formattedSize }}</td>
                                    <td class="text-center">
                                        <a href="{{ asset('assets/jamiyat_ichki_xujjatlari/' . $file) }}" target="_blank" class="gov-btn gov-btn-sm gov-btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('frontend.common.no_documents') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-frontend.stats-grid cols="2" class="gov-animate-fade" data-delay="0.3">
            <x-frontend.stat-card
                :value="count($files)"
                :label="__('frontend.common.total_documents')"
                icon="fa-file-pdf"
            />
            <x-frontend.stat-card
                :value="$totalSize >= 1048576 ? number_format($totalSize / 1048576, 1) . ' MB' : number_format($totalSize / 1024, 1) . ' KB'"
                :label="__('frontend.common.total_size')"
                icon="fa-hard-drive"
            />
        </x-frontend.stats-grid>

        <x-frontend.info-box type="info" class="gov-animate-fade" data-delay="0.4">
            <p>{{ __('frontend.internal_docs.info_text') }}</p>
        </x-frontend.info-box>
    </x-frontend.section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelector('.gov-page').classList.add('gsap-loaded');
        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el, { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.6, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 85%' } });
        });
    }
});
</script>
@endsection
