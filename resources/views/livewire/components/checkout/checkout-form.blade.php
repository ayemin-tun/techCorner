<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
    <!-- Shipping Address -->
    <div class="mb-6">
        <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
            Shipping Address
        </h2>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 dark:text-white mb-1" for="first_name">
                    First Name
                </label>
                <div class="relative">
                    <input wire:model="first_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('first_name') border-red-500 @enderror" id="first_name" type="text">
                    </input>
                    @error('first_name')
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    @enderror
                </div>

                @error('first_name')
                <div class="text-red-500 text sm p-2">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700 dark:text-white mb-1" for="last_name">
                    Last Name
                </label>
                <div class="relative">
                    <input wire:model="last_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('last_name') border-red-500 @enderror" id="last_name" type="text">
                    </input>
                    @error('last_name')
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    @enderror
                </div>
                @error('last_name')
                <div class="text-red-500 text sm p-2">{{$message}}</div>
                @enderror

            </div>
        </div>
        <div class="mt-4">
            <label class="block text-gray-700 dark:text-white mb-1" for="phone">
                Phone
            </label>
            <div class="relative">
                <input wire:model="phone" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('phone') border-red-500 @enderror" id="phone" type="number">
                </input>
                @error('phone')
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                    <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('phone')
            <div class="text-red-500 text sm p-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mt-4">
            <label class="block text-gray-700 dark:text-white mb-1" for="city">
                City
            </label>
            <div class="relative">
                <input wire:model="city" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('city') border-red-500 @enderror" id="city" type="text">
                </input>
                @error('city')
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                    <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('city')
            <div class="text-red-500 text sm p-2">{{$message}}</div>
            @enderror
        </div>
        <div class="mt-4">
            <label class="block text-gray-700 dark:text-white mb-1" for="address">
                Address
            </label>
            <div class="relative">
                <textarea wire:model="address" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('address') border-red-500 @enderror" id="address" type="text">
                 </textarea>
                @error('address')
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                    <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('address')
            <div class="text-red-500 text sm p-2">{{$message}}</div>
            @enderror
        </div>

    </div>
    <div class="text-lg font-semibold mb-4">
        Select Payment Method
    </div>
    <ul class="grid w-full gap-6 md:grid-cols-2">
        <li>
            <input wire:model="payment_method" class="hidden peer" id="hosting-small" required="" type="radio" value="cod" />
            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="hosting-small">
                <div class="block">
                    <div class="w-full text-lg font-semibold">
                        Cash on Delivery
                    </div>
                </div>
                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    </path>
                </svg>
            </label>

        </li>
        <li>
            <input wire:model="payment_method" class="hidden peer" id="hosting-big" type="radio" value="stripe">
            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="hosting-big">
                <div class="block">
                    <div class="w-full text-lg font-semibold">
                        Card
                    </div>
                </div>
                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    </path>
                </svg>
            </label>
            </input>
        </li>
        @error('payment_method')
        <div class="text-red-500 text sm p-2">{{$message}}</div>
        @enderror
    </ul>

</div>