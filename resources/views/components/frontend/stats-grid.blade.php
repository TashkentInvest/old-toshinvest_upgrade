{{-- Stats Grid Component --}}
@props([
    'columns' => 4
])

<div class="gov-stats-grid" style="--stats-columns: {{ $columns }}">
    {{ $slot }}
</div>
