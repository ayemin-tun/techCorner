<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="flex items-center font-poppins dark:bg-gray-800 ">
        <div class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto bg-white border rounded-md dark:border-gray-900 dark:bg-gray-900 md:py-10 md:px-10">
            <!-- pdf download  -->
            <!-- <div class="flex justify-end">
                <button wire:loading.remove wire:click="printOrderDetails" class="hover:text-blue-900 hover:font-bold duration-150 transition-all text-blue-600 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </button>
                <span wire:loading class="animate-spin text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                    </svg>
                </span>


            </div> -->

            <div>
                <h1 class="px-4 mb-8 text-2xl font-semibold tracking-wide text-gray-700 dark:text-gray-300 ">
                    Thank you. Your order has been received. </h1>
                <div class="flex border-b border-gray-200 dark:border-gray-700  items-stretch justify-start w-full h-full px-4 mb-8 md:flex-row xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex items-start justify-start flex-shrink-0">
                        <div class="flex items-center justify-center w-full pb-6 space-x-4 md:justify-start">
                            <div class="flex flex-col items-start justify-start space-y-2">
                                <p class="text-lg font-semibold leading-4 text-left text-gray-800 dark:text-gray-400">
                                    {{$order->address->full_name}}
                                </p>
                                <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">
                                    {{$order->address->address}}
                                </p>
                                <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">{{$order->address->city}}</p>
                                <p class="text-sm leading-4 cursor-pointer dark:text-gray-400">Phone: {{$order->address->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center pb-4 mb-10 border-b border-gray-200 dark:border-gray-700">
                    <div class="w-full px-4 mb-4 md:w-1/5">
                        <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                            Order Number: </p>
                        <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
                            {{$order->id}}
                        </p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/5">
                        <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                            Date: </p>
                        <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
                            {{$order->created_at->format('d-m-Y')}}
                        </p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/5">
                        <p class="mb-2 text-sm font-medium leading-5 text-gray-800 dark:text-gray-400 ">
                            Total: </p>
                        <p class="text-base font-semibold leading-4 text-blue-600 dark:text-gray-400">
                            {{Number::currency($order->grand_total,'USD')}}
                        </p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/5">
                        <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                            Payment Method: </p>
                        <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400 ">
                            {{$order->payment_method ==='cod'?'Cash on Delievery':"Card"}}
                        </p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/5">
                        <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                            Payment Status: </p>
                        <p class="text-base font-semibold leading-4 
                            @if($order->payment_status === 'pending') text-yellow-600 dark:text-yellow-400
                            @elseif($order->payment_status === 'paid') text-green-600 dark:text-green-400
                            @elseif($order->payment_status === 'failed') text-red-600 dark:text-red-400
                            @else text-gray-800 dark:text-gray-400
                            @endif">
                            {{$order->payment_status}}
                        </p>
                    </div>
                </div>
                <div class="px-4 mb-10">
                    <div class="flex flex-col items-stretch justify-center w-full space-y-4 md:flex-row md:space-y-0 md:space-x-8">
                        <div class="flex flex-col w-full space-y-6 ">
                            <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-400">Order details</h2>
                            <div class="flex flex-col items-center justify-center w-full pb-4 space-y-4 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between w-full">
                                    <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Subtotal</p>
                                    <p class="text-base leading-4 text-gray-600 dark:text-gray-400">{{Number::currency($order->grand_total,'USD')}}</p>
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Discount
                                    </p>
                                    <p class="text-base leading-4 text-gray-600 dark:text-gray-400">{{Number::currency(0,'USD')}}</p>
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Shipping</p>
                                    <p class="text-base leading-4 text-gray-600 dark:text-gray-400">
                                        {{Number::currency(0,'USD')}}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">Total</p>
                                <p class="text-base font-semibold leading-4 text-gray-600 dark:text-gray-400">{{Number::currency($order->grand_total,'USD')}}</p>
                            </div>
                        </div>
                        <div class="flex flex-col w-full px-2 space-y-4 md:px-8 ">
                            <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-400">Shipping</h2>
                            <div class="flex items-start justify-between w-full">
                                <div class="flex items-center justify-center space-x-2">
                                    <div class="w-8 h-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 text-blue-600 dark:text-blue-400 bi bi-truck" viewBox="0 0 16 16">
                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col items-center justify-start">
                                        <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-400">
                                            Delivery<br>
                                            <!-- <span class="text-sm font-normal">Delivery with 24 Hours</span> -->
                                        </p>
                                    </div>
                                </div>
                                <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-400">{{Number::currency(0,'USD')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-start gap-4 px-4 mt-6 ">
                    <a href="/products" class="w-full text-center px-4 py-2 text-blue-500 border border-blue-500 rounded-md md:w-auto hover:text-white hover:bg-blue-600 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-gray-300">
                        Go back shopping
                    </a>
                    <a href="/my-orders" class="w-full text-center px-4 py-2 bg-blue-500 rounded-md text-gray-50 md:w-auto dark:text-gray-300 hover:bg-blue-600 dark:hover:bg-gray-700 dark:bg-gray-800">
                        View My Orders
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>