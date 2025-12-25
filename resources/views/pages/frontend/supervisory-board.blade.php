@extends('layouts.frontend_app')
@section('title', __('frontend.supervisory.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.supervisory.title')"
        :badge="__('frontend.supervisory.management')"
        badgeIcon="fa-users"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.supervisory.title')]
        ]"
    />

    {{-- Members --}}
    <x-frontend.section bg="white">
        <div class="gov-team-grid">
            {{-- Chairman --}}
            <x-frontend.team-member
                :name="__('frontend.supervisory.chairman_name')"
                :position="__('frontend.supervisory.chairman_position')"
                photo="assets/users_img/1.Умурзаков Шавкат Буранович.jpg"
                :featured="true"
                delay="0.1"
            />

            {{-- Member 1 --}}
            <x-frontend.team-member
                :name="__('frontend.supervisory.member1_name')"
                :position="__('frontend.supervisory.member1_position')"
                photo="assets/users_img/2.Хайдаров Бахтиёр Халимович.jpg"
                delay="0.2"
            />

            {{-- Member 2 --}}
            <x-frontend.team-member
                :name="__('frontend.supervisory.member2_name')"
                :position="__('frontend.supervisory.member2_position')"
                photo="assets/users_img/3.Рахманов Шароф Диерович.jpg"
                delay="0.3"
            />

            {{-- Independent Member 1 --}}
            <x-frontend.team-member
                :name="__('frontend.supervisory.independent1_name')"
                :position="__('frontend.supervisory.independent_member')"
                photo="assets/users_img/adamas_ilkevicius.jpg"
                delay="0.4"
            />

            {{-- Independent Member 2 --}}
            <x-frontend.team-member
                :name="__('frontend.supervisory.independent2_name')"
                :position="__('frontend.supervisory.independent_member')"
                photo="assets/users_img/shariq_wali_khan.jpg"
                delay="0.5"
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
                { opacity: 1, y: 0, duration: 0.6, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 85%' } }
            );
        });
    }
});
</script>
@endsection
