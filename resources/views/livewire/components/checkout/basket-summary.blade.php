<div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
    <div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
        BASKET SUMMARY
    </div>
    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
        @foreach ($cart_items as $item )
        <li class="py-3 sm:py-4" wire:key={{$item['product_id']}}>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img alt="Neil image" class="w-12 h-12 rounded-full" src={{url('storage',$item['image'])}}>
                    </img>
                </div>
                <div class="flex-1 min-w-0 ms-4">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{$item['name']}}
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        Quantity: {{$item['quantity']}}
                    </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    {{Number::currency($item['total_amount'],'USD')}}
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>