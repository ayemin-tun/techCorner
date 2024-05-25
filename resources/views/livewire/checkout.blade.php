<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
        Checkout
    </h1>
    <form wire:submit.prevent='placeOrder'>
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <!-- Card -->
                @include('livewire.components.checkout.checkout-form')
                <!-- End Card -->
            </div>
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                @include('livewire.components.checkout.order-summary')
                <button wire:loading.remove class="bg-blue-800 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-blue-900">
                    Place Order
                </button>
                <div wire:loading.flex class="bg-blue-800 flex justify-center mt-4 w-full p-3 rounded-lg text-lg text-white">
                    Processing ...
                </div>
                @include('livewire.components.checkout.basket-summary')
                <!-- <a href="/cart">
                    <div class="bg-green-500 flex justify-center mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">
                        Go to Cart
                    </div>
                </a> -->
            </div>
        </div>
    </form>
</div>