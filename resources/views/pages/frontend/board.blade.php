@extends('layouts.frontend_app')
@section('title', __('frontend.board.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.board.title')"
        :subtitle="__('frontend.board.subtitle')"
        :badge="__('frontend.board.executive_body')"
        badgeIcon="fa-users-gear"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.board.title')]
        ]"
    />

    {{-- Chairman Section --}}
    <x-frontend.section bg="white">
        <div class="gov-team-grid">
            {{-- Chairman --}}
            <x-frontend.team-member
                :name="__('frontend.board.members.shakirov_name')"
                :position="__('frontend.board.general_director')"
                photo="assets/users_img/5.Шакиров Бахром Аскаралиевич.jpg"
                phone="+998 (71) 210 02 61"
                email="b.shakirov@tashkentinvest.com"
                :featured="true"
                delay="0.1"
            />

            {{-- Deputy 1 --}}
            <x-frontend.team-member
                :name="__('frontend.board.members.kodirov_name')"
                :position="__('frontend.board.deputy_strategy')"
                photo="assets/users_img/6.Кодиров Рустам Шухратович.jpg"
                phone="+998 (71) 210 02 61"
                email="rustam.kodirov@tashkentinvest.com"
                delay="0.2"
            />

            {{-- Deputy 2 --}}
            <x-frontend.team-member
                :name="__('frontend.board.members.otahonova_name')"
                :position="__('frontend.board.deputy_projects')"
                photo="assets/users_img/Nargiza_25-12-02_10-59-13.jpg"
                phone="+998 (71) 210 02 61"
                email="n.otahonova@tashkentinvest.com"
                delay="0.3"
            />
        </div>
    </x-frontend.section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelector('.gov-page').classList.add('gsap-loaded');

        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el,
                { opacity: 0, y: 30 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    delay: parseFloat(el.dataset.delay) || 0,
                    scrollTrigger: { trigger: el, start: 'top 85%' }
                }
            );
        });
    }
});
</script>
@endsection
