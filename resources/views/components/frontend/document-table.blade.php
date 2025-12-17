{{-- Document Table Component --}}
@props([
    'headers' => [],
    'emptyMessage' => null
])

<div class="gov-table-container gov-animate-fade">
    <table class="gov-table">
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th class="{{ $header['class'] ?? '' }}">{{ $header['label'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>

    @if($emptyMessage)
        <div class="gov-table-empty" style="display: none;">
            <i class="fa-solid fa-folder-open"></i>
            <p>{{ $emptyMessage }}</p>
        </div>
    @endif
</div>
