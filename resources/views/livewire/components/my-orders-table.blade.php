<div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Amount</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($orders as $order )

                            @php
                                $status = '';
                                $payment_status ='';
                                $status_value = ucfirst($order->status);
                                $payment_status_value = ucfirst($order->payment_status);
                                if($order->status =='new'){
                                    $status = "<span class='bg-blue-500 py-1 px-3 rounded text-white shadow'>".$status_value."</span>";
                                }
                                if( $order->status=='shipped' ||$order->status=='delivered'){
                                    $status = "<span class='bg-green-500 py-1 px-3 rounded text-white shadow'>".$status_value."</span>";
                                }
                                if($order->status =='processing'){
                                    $status = "<span class='bg-orange-500 py-1 px-3 rounded text-white shadow'>".$status_value."</span>";
                                }
                                if($order->status =='cancelled'){
                                    $status = "<span class='bg-red-500 py-1 px-3 rounded text-white shadow'>".$status_value."</span>";
                                }
                                if($order->payment_status =='paid'){
                                    $payment_status = "<span class='bg-green-500 py-1 px-3 rounded text-white shadow'>".$payment_status_value."</span>";
                                }
                                if($order->payment_status =='pending'){
                                    $payment_status = "<span class='bg-orange-500 py-1 px-3 rounded text-white shadow'>".$payment_status_value."</span>";
                                }
                                if($order->payment_status =='failed'){
                                    $payment_status = "<span class='bg-red-500 py-1 px-3 rounded text-white shadow'>".$payment_status_value."</span>";
                                }
                            @endphp

                            <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800" wire:key={{$order->id}}>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$order->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$order->created_at->format('d-m-Y')}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    {!! $status !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    {!! $payment_status !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{Number::currency($order->grand_total,'USD')}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a href="/my-orders/{{$order->id}}" wire:navigate class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">View Details</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>