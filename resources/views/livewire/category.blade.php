<div class="w-full max-w-[85rem] py-5 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h1 class="text-blue-800 text-xl font-medium mb-3">Categories</h1>
        <!-- Search Input -->
        <div class="mb-6 flex justify-end">
            <div class="relative sm:w-[40%] w-full">
                <input type="text" class="w-full  px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" placeholder="Search categories..." wire:model.live.debonce.300ms="search" name="search" />
                @if ($search)
                <span class="absolute right-3 top-3 cursor-pointer hover:text-red-500 hover:font-semibold transition-all duration-200" wire:click="clearSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </span>
                @endif


                <span class="absolute right-7 top-3 text-blue-600 animate-spin" wire:loading>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                    </svg>


                </span>

            </div>

        </div>
        @if ($categories->count()>0)
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 sm:gap-6">
            @foreach ($categories as $category)
            <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/products?selected_categories[0]={{$category->id}}" wire:key={{$category->id}} wire:navigate>
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="h-[5rem] w-[5rem]" src="{{ url('storage', $category->image) }}" alt="{{ $category->name }}">
                            <div class="ms-3">
                                <h3 class="group-hover:text-blue-600 text-2xl font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="ps-3">
                            <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>
        @endif

        @if ($categories->count()===0) <div class="w-full p-3 mt-4">
            <h1 class="text-center text-lg font-semibold">No Categories</h1>
        </div>
        @endif

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>