<div class="w-full min-h-screen flex justify-start items-center flex-col md:py-16 py-7">
    <div class="border w-[80%] p-5 bg-white shadow">
        <h1 class="text-xl my-4 font-bold text-gray-700">Profile Information</h1>
        <hr>
        <form wire:submit.prevent='update'>
            <div class="grid md:grid-cols-2 grid-cols-1 gap-3 mt-3">
                <div class="flex flex-col gap-1 w-full relative">
                    <label for="name" class="mb-1 font-bold text-lg text-gray-700">Name <span class="text-sm text-red-400">*</span></label>
                    <input type="text" name="" wire:model="name" id="name" class="border p-2 rounded-md @error('name') border-red-500 @else border-gray-500 @enderror">
                    @error('name')
                    <div class="absolute top-11 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="text-red-500 text sm p-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 w-full relative">
                    <label for="email" class="mb-1 font-bold text-lg text-gray-700">Email <span class="text-sm text-red-400">*</span></label>
                    <input type="text" name="" wire:model="email" id="email"  class="border p-2 rounded-md @error('email') border-red-500 @else border-gray-500 @enderror">

                    @error('email')
                    <div class="absolute top-11 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="text-red-500 text sm p-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 w-full mt-2 relative">
                    <label for="password" class="mb-1 font-bold text-lg text-gray-700">Password (Optional)</label>
                    <input type="password" name="" wire:model="password" id="password" class="border p-2 rounded-md @error('password') border-red-500 @else border-gray-500 @enderror">
                    @error('password')
                    <div class="absolute top-11 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="text-red-500 text sm p-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 w-full mt-2">
                    <label for="password_confirmation" class="mb-1 font-bold text-lg text-gray-700">Password Confirmation</label>
                    <input type="password" name="" wire:model="password_confirmation" id="password_confirmation" class="border p-2 rounded-md @error('password') border-red-500 @else border-gray-500 @enderror">
                    @error('password')
                    <div class="absolute top-11 end-0 flex items-center pointer-events-none pe-3">
                        <svg class="h-6 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="text-red-500 text sm p-2">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="flex justify-center mt-5">
                <button wire:loading.remove class="w-full px-4 py-2 bg-blue-600 text-white hover:bg-blue-800 duration-150 transition-colors" type="submit">
                    Update
                </button>
                <div wire:loading.flex class="w-full flex justify-center px-4 py-2 bg-blue-600 text-white hover:bg-blue-800 duration-150 transition-colors" type="submit">
                    Updating ...
                </div>
            </div>


        </form>
    </div>

</div>