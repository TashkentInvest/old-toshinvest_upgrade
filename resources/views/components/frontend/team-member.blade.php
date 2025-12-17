{{-- Team Member Card Component --}}
@props([
    'name',
    'position',
    'photo' => null,
    'phone' => null,
    'email' => null,
    'featured' => false,
    'animate' => true,
    'delay' => '0'
])

<div class="gov-team-card {{ $featured ? 'featured' : '' }} {{ $animate ? 'gov-animate-fade' : '' }}" @if($animate) data-delay="{{ $delay }}" @endif>
    <div class="gov-team-photo">
        @if($photo)
            <img src="{{ asset($photo) }}" alt="{{ $name }}" loading="lazy">
        @else
            <div class="gov-team-placeholder">
                <i class="fa-solid fa-user"></i>
            </div>
        @endif
    </div>
    <div class="gov-team-info">
        <h3 class="gov-team-name">{{ $name }}</h3>
        <p class="gov-team-position">{{ $position }}</p>

        @if($phone || $email)
            <div class="gov-team-contacts">
                @if($phone)
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="gov-team-contact">
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ $phone }}</span>
                    </a>
                @endif
                @if($email)
                    <a href="mailto:{{ $email }}" class="gov-team-contact">
                        <i class="fa-solid fa-envelope"></i>
                        <span>{{ $email }}</span>
                    </a>
                @endif
            </div>
        @endif

        {{ $slot }}
    </div>
</div>
