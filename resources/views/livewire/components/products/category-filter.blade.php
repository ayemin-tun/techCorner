<div class="p-4 mb-5 bg-white border border-gray-200 dark:border-gray-900 dark:bg-gray-900">
    <h2 class="text-2xl font-bold dark:text-gray-400"> Categories</h2>
    <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
    <ul>
        @foreach ($categories as $category )
        <li class="mb-4" wire:key={{$category->id}}>
            <label for="{{$category->slug}}" class="flex items-center dark:text-gray-400 cursor-pointer">
                <input type="checkbox" id={{$category->slug}} value={{$category->id}} class="w-4 h-4 mr-2" wire:model.live="selected_categories">
                <span class="text-lg">{{$category->name}}</span>
            </label>
        </li>
        @endforeach

    </ul>

</div>