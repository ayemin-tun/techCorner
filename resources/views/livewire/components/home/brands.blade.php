<section class="py-20">
    <div class="max-w-xl mx-auto">
        <div class="text-center ">
            <div class="relative flex flex-col items-center">
                <h1 class="text-5xl font-bold dark:text-gray-200"> Browse Popular<span class="text-blue-500"> Brands
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
    <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
        <div class="grid grid-cols-2 gap-6 lg:grid-cols-4 md:grid-cols-2">
            @foreach ($brands as $brand )
            <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{$brand->id}}">
                <a href="" class="">
                    <img src="{{url('storage',$brand->image)}}" alt="" class="object-cover w-full md:h-64 h-28 rounded-t-lg">
                </a>
                <div class="p-5 text-center">
                    <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                        {{$brand->name}}
                    </a>
                </div>
            </div>
            @endforeach
            @if($brands->count() === 7)
            <div class="flex items-end justify-end" wire:key="{{$brand->id}}">
                <a href="/categories" class="cursor-pointer text-blue-700">
                    <h1 class="text-base font-semibold p-2 flex gap-1 items-center border bg-white rounded-md hover:bg-blue-600 hover:text-white duration-200 transition-colors shadow">
                        See More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>

                    </h1>
                </a>

            </div>
            @endif


        </div>
    </div>
</section>