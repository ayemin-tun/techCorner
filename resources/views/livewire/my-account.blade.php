<div class="w-full min-h-screen flex" x-data="{ open: false, activeTab: 'dashboard' }">
    <div class="bg-gray-300 md:w-[20%] md:block hidden w-full z-30 py-10">
        <h1 class="text-xl text-center mb-5 text-black font-bold">My Profile</h1>
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </div>
        <p class="text-center text-xl font-semibold text-gray-800 mt-4"> {{$auth_user->name}} </p>

        <div class="flex flex-col items-center">
            <ul class="mt-5">
                <li @click="activeTab = 'dashboard'" :class="{'text-blue-600 font-bold': activeTab === 'dashboard'}" class="m-3 cursor-pointer">Dashboard</li>
                <li @click="activeTab = 'profile_update'" :class="{'text-blue-600 font-bold': activeTab === 'profile_update'}" class="m-3 cursor-pointer">Profile Update</li>
            </ul>
        </div>

    </div>

    <div class="bg-gray-300 md:hidden block w-[40%] py-10 h-auto" x-transition x-show="open">
        <h1 class="md:text-xl text-lg text-center mb-5 text-black font-bold">My Profile</h1>
        <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </div>
        <p class="text-center md:text-xl text-base text-pretty font-semibold text-gray-800"> {{$auth_user->name}} </p>

        <div class="flex flex-col items-center">
            <ul class="mt-5">
                <li @click="activeTab = 'dashboard'; open = false" :class="{'text-blue-600': activeTab === 'dashboard'}" class="m-3 cursor-pointer md:text-base text-sm">Dashboard</li>
                <li @click="activeTab = 'profile_update'; open = false" :class="{'text-blue-600': activeTab === 'profile_update'}" class="m-3 cursor-pointer md:text-base text-sm">Profile Update</li>
            </ul>
        </div>

    </div>

    <div :class="{'w-full md:w-[80%]': !open, 'w-[60%] md:w-[80%]': open}" x-transition>
        <button @click="open = ! open" class="md:hidden block m-3">
            <!-- Open icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" x-show="!open" x-transition>
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Close icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" x-show="open" x-transition>
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>

        <div x-show="activeTab === 'dashboard'">
            @include('livewire.components.my-account.dashboard')
        </div>
        <div x-show="activeTab === 'profile_update'">
            @include('livewire.components.my-account.profile-update')
        </div>

    </div>
</div>