@props(['iconOnly' => false, 'size' => 'h-9 w-9', 'class' => ''])

@php
    $images = ['logo diet.jpeg', 'logo diet.jpg', 'logo diet.png', 'logo.png', 'logo.jpeg', 'logo.jpg'];
    $found = '';
    foreach ($images as $img) {
        if (file_exists(public_path('images/' . $img))) {
            $found = 'images/' . $img;
            break;
        }
    }
    $extraClass = $attributes->get('class', '');
@endphp

@if ($found)
    @if ($iconOnly)
        <img src="{{ asset($found) }}" alt="NutrimED"
             class="{{ $size }} object-contain {{ $class }} {{ $extraClass }}">
    @else
        <div class="flex items-center gap-2 {{ $class }} {{ $extraClass }}">
            <img src="{{ asset($found) }}" alt="NutrimED" class="{{ $size }} object-contain">
            <span class="font-bold tracking-wide">Nutrim<span class="text-emerald-500">ED</span></span>
        </div>
    @endif
@elseif ($iconOnly)
    <svg viewBox="0 0 64 64" fill="none"
         class="{{ $size }} {{ $class }} {{ $extraClass }}">
        <circle cx="32" cy="32" r="30" fill="currentColor" opacity="0.1"/>
        <path d="M32 14C28 14 22 16.5 22 22C22 25.5 26 29 32 34C38 29 42 25.5 42 22C42 16.5 36 14 32 14Z" stroke="currentColor" stroke-width="2.5" fill="rgba(255,255,255,0.3)"/>
        <path d="M18 36C18 33.5 20.5 30 26 28.5L32 26L38 28.5C43.5 30 46 33.5 46 36C46 45 32 54 32 54C32 54 18 45 18 36Z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round" fill="rgba(255,255,255,0.12)"/>
        <path d="M34 22L40 16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
        <path d="M40 16C42 14 44 14 44.5 15.5C45 17 43.5 19 41 20.5L38 23" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
@else
    <div class="flex items-center gap-2 {{ $class }} {{ $extraClass }}">
        <svg viewBox="0 0 64 64" fill="none" class="{{ $size }}">
            <circle cx="32" cy="32" r="30" fill="currentColor" opacity="0.1"/>
            <path d="M32 14C28 14 22 16.5 22 22C22 25.5 26 29 32 34C38 29 42 25.5 42 22C42 16.5 36 14 32 14Z" stroke="currentColor" stroke-width="2.5" fill="rgba(255,255,255,0.3)"/>
            <path d="M18 36C18 33.5 20.5 30 26 28.5L32 26L38 28.5C43.5 30 46 33.5 46 36C46 45 32 54 32 54C32 54 18 45 18 36Z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round" fill="rgba(255,255,255,0.12)"/>
            <path d="M34 22L40 16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <path d="M40 16C42 14 44 14 44.5 15.5C45 17 43.5 19 41 20.5L38 23" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="font-bold tracking-wide">Nutrim<span class="text-emerald-500">ED</span></span>
    </div>
@endif
