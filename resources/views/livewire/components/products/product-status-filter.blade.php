<div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
    <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
    <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
    <ul>
        <li class="mb-4">
            <label for="featured" class="flex items-center dark:text-gray-300">
                <input type="checkbox" class="w-4 h-4 mr-2" id="featured" wire:model.live="featured" value="1">
                <span class="text-lg dark:text-gray-400">Featured Product</span>
            </label>
        </li>
        <li class="mb-4">
            <label for="on_sale" class="flex items-center dark:text-gray-300">
                <input type="checkbox" class="w-4 h-4 mr-2" id="on_sale" value="1" wire:model.live="on_sale">
                <span class="text-lg dark:text-gray-400">On Sale</span>
            </label>
        </li>
    </ul>
</div>