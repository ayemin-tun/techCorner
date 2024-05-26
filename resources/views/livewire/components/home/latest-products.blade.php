<section class="py-20">
    <div class="max-w-xl mx-auto">
        <div class="text-center">
            <div class="relative flex flex-col items-center">
                <h1 class="text-5xl font-bold dark:text-gray-200"> Browse Latest<span class="text-blue-500"> Products
                    </span> </h1>
                <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                    <div class="flex-1 h-2 bg-blue-200"></div>
                    <div class="flex-1 h-2 bg-blue-400"></div>
                    <div class="flex-1 h-2 bg-blue-600"></div>
                </div>
            </div>
            <p class="mb-12 text-base text-center text-gray-500">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque?
                Pariatur numquam, odio quod nobis ipsum ex cupiditate?
            </p>
        </div>
    </div>
    <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0" x-data="{ scrollLeft() { this.$refs.container.scrollBy({left: -300, behavior: 'smooth'}) }, scrollRight() { this.$refs.container.scrollBy({left: 300, behavior: 'smooth'}) } }">
        <div class="md:flex justify-end m-2 hidden">
            <div>
                <button @click="scrollLeft" class="p-2 text-black bg-white lg:-ml-6 border hover:bg-blue-600 focus:outline-none hover:text-white duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button @click="scrollRight" class="p-2 text-black bg-white border lg:-mr-6 hover:bg-blue-600 focus:outline-none hover:text-white duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex overflow-x-auto space-x-6 scrollbar-hide" x-ref="container">
            @foreach ($latest_products as $product)
            <div class="border flex-none w-80 bg-white shadow-md dark:bg-gray-800" wire:key="{{$product->id}}">
                <a href="/products/{{$product->slug}}" class="" wire:navigate>
                    <img src="{{url('storage',$product->images[0])}}" alt="" class="object-cover w-full h-64 ">
                </a>
                <div class="p-5">
                    <p class="text-lg font-bold tracking-tight text-black dark:text-gray-300">
                        {{$product->name}}
                    </p>
                    <p class="py-1 text-green-500">
                        {{Number::currency($product->price,'USD')}}
                    </p>
                </div>
                <div class="div w-full border-t-2 text-center p-3 hover:bg-blue-700 hover:text-white duration-150 transition-all cursor-pointer" wire:click.prevent='addToCart({{$product->id}})' wire:loading.remove wire:target='addToCart({{$product->id}})'>
                    <p class="flex justify-center items-center gap-1 tracking-tight">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                        </svg>
                        Add To Cart
                    </p>
                </div>

                <div class="div w-full border-t-2 text-center p-3 bg-gray-400 duration-150 transition-all" wire:loading wire:target='addToCart({{$product->id}})'>
                    <p class="flex justify-center items-center gap-1 tracking-tight">
                        <span wire:loading class="animate-spin text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                            </svg>
                        </span>
                        Addding ...
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<style>
    @media (min-width: 1024px) {
        .flex-none {
            width: calc((100% / 4) - 1rem);
            /* Width for 3 cards with some spacing */
        }
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>