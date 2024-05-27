<div class="w-full min-h-screen p-5">
    <h1 class="text-xl font-bold py-5">Dashboard</h1>

    <div class=" grid sm:grid-cols-4 grid-cols-2">
        <a href="/my-orders" wire:navigate>
            <div class="flex flex-col items-center justify-center bg-white border h-28 cursor-pointer overflow-hidden">
                <h1 class="text-4xl font-bold">{{count($total_orders)}}</h1>
                <span class="flex items-center gap-1 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-blue-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <span class="font-bold">Total</span>
                </span>
            </div>
        </a>
        <a href="/my-orders" wire:navigate>
            <div class="flex flex-col items-center justify-center bg-white border h-28 cursor-pointer  overflow-hidden">
                <h1 class="text-4xl font-bold">{{count($processing_orders)}}</h1>
                <span class="flex items-center gap-1 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-orange-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>

                    <span class="font-bold">Processing</span>
                </span>
            </div>
        </a>
        <a href="/my-orders" wire:navigate>
            <div class="flex flex-col items-center justify-center bg-white border h-28 cursor-pointer  overflow-hidden">
                <h1 class="text-4xl font-bold">{{count($delivered_orders)}}</h1>
                <span class="flex items-center gap-1 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                    </svg>

                    <span class="font-bold">Delivered</span>
                </span>
            </div>
        </a>
        <a href="/my-orders" wire:navigate>
            <div class="flex flex-col items-center justify-center bg-white border h-28 cursor-pointer  overflow-hidden">
                <h1 class="text-4xl font-bold">{{count($cancelled_orders)}}</h1>
                <span class="flex items-center gap-1 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <span class="font-bold">Cancelled</span>
                </span>
            </div>
        </a>

    </div>

    <h1 class="mt-4 text-lg font-bold">Latest Orders</h1>
    @include('livewire.components.my-orders-table')

</div>