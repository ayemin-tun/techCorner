<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">

                    @include('livewire.components.products.category-filter')

                    @include('livewire.components.products.brand-filter')

                    @include('livewire.components.products.product-status-filter')

                    @include('livewire.components.products.price-filter')

                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4 flex justify-between">
                        @include('livewire.components.products.sort-filter')

                        <div class="relative">
                            <input type="text" placeholder="Search Product" name="product" id="" class="bg-white p-2 border" wire:model.live.debonce.300ms="search">
                            @if ($search)
                            <span class="absolute right-3 top-3 cursor-pointer hover:text-red-500 hover:font-semibold transition-all duration-200" wire:click="clearSearch">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </span>
                            @endif

                            <span class="absolute right-7 top-3 text-blue-600 animate-spin" wire:loading wire:target="search, selected_categories, selected_brands, featured, on_sale, price_range, sort, updatingSearch, clearSearch">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Loading Spinner -->
                    <div wire:loading.flex wire:target="search, selected_categories, selected_brands, featured, on_sale, price_range, sort, updatingSearch, clearSearch" class="w-full flex flex-wrap items-center">
                        @include('livewire.components.products.skeleton-loader')
                    </div>
                    @if($products->count()>0)
                    <div wire:loading.remove wire:target="search, selected_categories, selected_brands, featured, on_sale, price_range, sort, updatingSearch, clearSearch" class="flex flex-wrap items-center ">
                        @foreach ($products as $product )
                        <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key={{$product->id}}>
                            <div class="border border-gray-300 dark:border-gray-700">
                                <div class="relative bg-gray-200">
                                    <a href="/products/{{$product->slug}}" class="" wire:navigate>
                                        {{$product->image}}
                                        <img src="{{ url('storage', $product->images[0]) }}" alt={{$product->name}} class="object-cover w-full h-56 mx-auto ">
                                    </a>
                                </div>
                                <div class="p-3 ">
                                    <div class="flex items-center justify-between gap-2 mb-2">
                                        <h3 class="text-xl font-medium dark:text-gray-400">
                                            {{$product->name}}
                                        </h3>
                                    </div>
                                    <p class="text-lg ">
                                        <span class="text-green-600 dark:text-green-600">{{Number::currency($product->price)}}</span>
                                    </p>
                                </div>
                                <!-- Add to cart button -->
                                <div wire:loading.remove wire:target='addToCart({{$product->id}})' class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700 hover:bg-blue-600 hover:text-white duration-200 transition-colors cursor-pointer" wire:click.prevent='addToCart({{$product->id}})'>

                                    <a class="flex items-center space-x-2 dark:text-gray-400  dark:hover:text-red-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                        </svg>
                                        <span>Add to Cart</span>

                                    </a>

                                </div>
                                <div wire:loading.flex wire:target='addToCart({{$product->id}})' class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700 hover:bg-blue-600 hover:text-white duration-200 transition-colors cursor-pointer">

                                    <a class="flex items-center space-x-2 dark:text-gray-400  dark:hover:text-red-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                        </svg>
                                        <span>Adding ...</span>
                                    </a>

                                </div>
                                <!-- End Of add to cart item -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div wire:loading.remove wire:target="search, selected_categories, selected_brands, featured, on_sale, price_range, sort, updatingSearch,clearSearch" class="flex justify-center p-4 mt-10">
                        <h1 class="font-bold text-xl text-gray-600">Ther is no Product for this filter!</h1>
                    </div>
                    @endif

                    <!-- pagination start -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                    <!-- pagination end -->
                </div>
            </div>
        </div>
    </section>

</div>