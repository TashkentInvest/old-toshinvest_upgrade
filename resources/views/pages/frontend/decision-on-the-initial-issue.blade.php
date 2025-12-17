@extends('layouts.frontend_app')
@section('title', __('frontend.initial_issue.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.initial_issue.title')"
        :subtitle="__('frontend.initial_issue.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-lines"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.initial_issue.title')]
        ]"
    />

    <x-frontend.section bg="white">
        <x-frontend.pdf-viewer
            src="https://drive.google.com/file/d/1idn27zGgPK7T-HiBlD5l1MxRmAp4gv75/preview"
            height="1200px"
            type="google"
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
