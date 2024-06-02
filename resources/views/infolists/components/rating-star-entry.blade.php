<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
<div class="flex">
        @php
            $rating = $getState();
        @endphp
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $rating)
                <x-heroicon-s-star class="h-5 w-5" style="color:yellow" />
            @else
                <x-heroicon-s-star class="h-5 w-5 text-gray-500" />
            @endif
        @endfor
    </div>
</x-dynamic-component>
