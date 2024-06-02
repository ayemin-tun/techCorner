<div class="w-full min-h-screen">
    <h1 class="text-lg font-bold md:mx-16 mx-6 my-7">Your Review</h1>

    @if($authUser_review)
        <div class="grid md:grid-cols-2 grid-cols-1 md:px-16 px-6 gap-2">
            <livewire:review.review-card :review="$authUser_review" />
        </div>
    @else
        <div>
            <h3 class="text-center my-10">There is no review 
                <a class="px-3 py-1 bg-blue-600 text-white mx-3 rounded-md hover:bg-blue-700 transition-all duration-150 cursor-pointer" wire:navigate href="/review/create">Create</a>
            </h3>
        </div>
    @endif 

    <div class="flex justify-center">
        <hr class="w-[80%] text-gray-500 font-extrabold">
    </div>

    <h1 class="text-lg font-bold mx-16 my-10">Other</h1>

    @if($reviews->count() > 0)
        <div class="grid md:grid-cols-2 grid-cols-1 md:px-16 px-6 gap-2 my-5">
            @foreach ($reviews as $review)
                <livewire:review.review-card :review="$review" :key="$review->id"/>
            @endforeach
        </div>
    @else
        <div>
            <h3 class="text-center my-10">There is no other review</h3>
        </div>
    @endif

      <div class="md:my-10 md:mx-16 my-6 mx-6">
            {{ $reviews->links() }}
        </div>
</div>
