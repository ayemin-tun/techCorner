<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
    <div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
        ORDER SUMMARY
    </div>
    <div class="flex justify-between mb-2 font-bold">
        <span>
            Subtotal
        </span>
        <span>
            {{Number::currency($grand_total,'USD')}}
        </span>
    </div>
    <div class="flex justify-between mb-2 font-bold">
        <span>
            Taxes
        </span>
        <span>
            {{Number::currency(0,'USD')}}
        </span>
    </div>
    <div class="flex justify-between mb-2 font-bold">
        <span>
            Shipping Cost
        </span>
        <span>
            {{Number::currency(0,'USD')}}
        </span>
    </div>
    <hr class="bg-slate-400 my-4 h-1 rounded">
    <div class="flex justify-between mb-2 font-bold">
        <span>
            Grand Total
        </span>
        <span>
            {{Number::currency($grand_total,'USD')}}
        </span>
    </div>
    </hr>
</div>