@for ($i = 0; $i < 6; $i++) <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3">
    <div class="border border-gray-300 dark:border-gray-700">
        <div class="relative bg-gray-200">
            <div class="animate-pulse bg-gray-300 h-56"></div>
        </div>
        <div class="p-3">
            <div class="flex items-center justify-between gap-2 mb-2">
                <div class="h-6 bg-gray-300 rounded w-3/4"></div>
            </div>
            <p class="text-lg">
                <span class="block h-4 bg-gray-300 rounded w-1/4"></span>
            </p>
        </div>
        <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
            <div class="h-4 bg-gray-300 rounded w-1/2"></div>
        </div>
    </div>
    </div>
    @endfor