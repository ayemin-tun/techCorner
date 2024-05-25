<x-mail::layout>
    <x-slot name="header">
        <h1>{{ config('app.name') }}</h1>
    </x-slot>

    <x-slot name="slot">
        <h2>Order Placed Successfully</h2>

        <p>Thank you for your order. Your order number is: {{ $order->id }}.</p>

        <x-mail::button :url="$url">
            View Order
        </x-mail::button>

        <p>Thanks,<br>
        {{ config('app.name') }}</p>
    </x-slot>

    <x-slot name="footer">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </x-slot>
</x-mail::layout>
