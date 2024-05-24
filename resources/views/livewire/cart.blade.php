<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                                <th class="text-left font-semibold"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart_items as $item )
                            <tr wire:key="{{$item['product_id']}}">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 mr-4" src="{{url('storage',$item['image'])}}" alt="{{$item['name']}}">
                                        <span class="font-semibold">{{$item['name']}}</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    {{Number::currency($item['unit_amount'],'USD')}}
                                </td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <button class="border rounded-md py-2 px-4 mr-2 hover:bg-blue-600 hover:text-white duration-200 transition-colors" wire:click='decreaseQty({{$item['product_id']}})'>-</button>
                                        <span class="text-center w-8">{{$item['quantity']}}</span>
                                        <button class="border rounded-md py-2 px-4 mr-2 hover:bg-blue-600 hover:text-white duration-200 transition-colors" wire:click='increaseQty({{$item['product_id']}})'>+</button>
                                    </div>
                                </td>
                                <td class="py-4">
                                    {{Number::currency($item['total_amount'],'USD')}}
                                </td>
                                <td>
                                    <button class=" px-3 py-1 hover:text-red-600 text-red-700 font-bold " wire:click="removeItem({{$item['product_id']}})">
                                        <span wire:loading.remove wire:target="removeItem({{$item['product_id']}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </span>
                                        <span wire:loading wire:target="removeItem({{$item['product_id']}})" class="animate-spin">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                                            </svg>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-7 text-xl font-semibold text-slate-500">No items available in cart!</td>
                            </tr>
                            @endforelse

                            <!-- More product rows -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>{{Number::currency($grand_total,'USD')}}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>{{Number::currency(0,'USD')}}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>{{Number::currency(0,'USD')}}</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">{{Number::currency($grand_total,'USD')}}</span>
                    </div>
                    @if ($cart_items)
                    <a href="/checkout" wire:navigate class="block text-center bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>