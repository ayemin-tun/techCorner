<div x-data="{open: false}" class="lg:hidden">
    <div class="flex justify-end">
        <button @click="open = !open" class="bg-white border p-2 mb-2 text-left flex items-center gap-2 ">
            <template x-if="!open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
            </template>
            <template x-if="open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </template>
            <span x-text="open ? 'Close' : 'Filters'"></span>
        </button>
    </div>
    <div x-show="open" x-transition class="space-y-2">
        @include('livewire.components.products.category-filter')
        @include('livewire.components.products.brand-filter')
        @include('livewire.components.products.product-status-filter')
        @include('livewire.components.products.price-filter')
    </div>

</div>