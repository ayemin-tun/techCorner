<div>
    <!-- Hero Section -->
    @include('livewire.components.home.hero')

    <!-- Latest Products Section -->
    @include('livewire.components.home.latest-products')

    <!-- Category Section  -->
    @include('livewire.components.home.categories')

    <!-- Customer Review -->
    <section class="py-14 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
            <div class="max-w-xl mx-auto">
                <div class="text-center ">
                    <div class="relative flex flex-col items-center">
                        <h1 class="text-5xl font-bold dark:text-gray-200"> Customer <span class="text-blue-500"> Reviews
                            </span> </h1>
                        <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                            <div class="flex-1 h-2 bg-blue-200">
                            </div>
                            <div class="flex-1 h-2 bg-blue-400">
                            </div>
                            <div class="flex-1 h-2 bg-blue-600">
                            </div>
                        </div>
                    </div>
                    <p class="mb-12 text-base text-center text-gray-500">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque?
                        Pariatur
                        numquam, odio quod nobis ipsum ex cupiditate?
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 ">
                @foreach ($reviews as $review)
                <livewire:review.review-card :review="$review" :key="$review->id" />
                @endforeach
            </div>
            @if(count($reviews)===4)
            <div class="flex justify-end mt-10">
                <a href="/review" wire:navigate class="flex items-center gap-1 cursor-pointer text-blue-500 hover:text-blue-700">
                    see more
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>

                </a>
            </div>
            @endif
        </div>
    </section>
</div>