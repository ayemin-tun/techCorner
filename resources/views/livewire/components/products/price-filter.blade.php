<div x-data="{ price: @entangle('price_range').live }" class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
    <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
    <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
    <div>
        <div class="font-semibold" x-text="new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(price)"></div>
        <input type="range" class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer" max="50000" value="1000" step="10" x-model="price">
        <div class="flex justify-between">
            <span class="inline-block text-lg font-bold text-blue-400">{{ Number::currency(1000, 'USD') }}</span>
            <span class="inline-block text-lg font-bold text-blue-400">{{ Number::currency(50000, 'USD') }}</span>
        </div>
    </div>
</div>