@extends('layouts.frontend_app')
@section('title', __('frontend.affiliated.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.affiliated.title')"
        :subtitle="__('frontend.affiliated.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-users"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.affiliated.title')]
        ]"
    />

    <x-frontend.section bg="white">
        <x-frontend.pdf-viewer
            :src="asset('assets/affilirovanniy/Список_аффилированных_лиц_АО_Компания_Ташкент_Инвест_2024_год_2.pdf')"
            height="1200px"
        />
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
