<div class="py-6 bg-white rounded-md shadow dark:bg-gray-900 relative">
@if($review->user_id === auth()->id())
    <div class="absolute right-0 -top-1 transform bg-orange-600 text-white px-2 py-1 text-sm" style="transform-origin: top right;">
        Your Review
    </div>
    @endif
    <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
        <div class="flex items-center px-6 mb-2 md:mb-0 ">
            <div class="flex mr-2 rounded-full">
                <img src="{{url('storage/assets/profile.png')}}" alt="" class="object-cover w-12 h-12 rounded-full">
            </div>
            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                    {{$user->name}}
                </h2>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{$review->created_at->format('d-m-Y')}}
                </p>
            </div>
        </div>
        @if($review->user_id === auth()->id())
        @include('livewire.components.review.dropdown')
        @endif
    </div>
    @if(strlen($review->review)>150)
    <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400" x-data="{ showFullReview: false }">
        <span x-show="showFullReview">
            {{$review->review}}
            <span class="cursor-pointer text-blue-500" @click="showFullReview = false"> See less</span>
        </span>
        <span x-show="!showFullReview">
            <span x-text="`{{ substr($review->review, 0, 150) }}`"></span>
            <span class="cursor-pointer text-blue-500" @click="showFullReview = true">... See more</span>
        </span>
    </p>
    @else
    <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
        {{$review->review}}
    </p>
    @endif

    <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
        <div class="flex px-6 mb-2 md:mb-0">
            <ul class="flex items-center justify-start mr-4">
                @for ($i = 0; $i < $review->rating; $i++)
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                </path>
                            </svg>
                        </a>
                    </li>
                    @endfor

            </ul>
            <h2 class="text-sm text-gray-500 dark:text-gray-400">Rating:<span class="font-semibold text-gray-600 dark:text-gray-300">
                    {{$review->rating}}.0</span>
            </h2>
        </div>

    </div>
</div>