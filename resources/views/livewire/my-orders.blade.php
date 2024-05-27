<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-xl font-bold text-slate-500">My Orders</h1>
    @include('livewire.components.my-orders-table')
    <div class="mt-10">
    {{$orders->links()}}
    </div>
   
</div>