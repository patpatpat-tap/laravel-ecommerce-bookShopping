@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('orders.index') }}" class="text-emerald-700 hover:text-emerald-800 font-medium flex items-center gap-1">
            <span class="text-lg">←</span>
            <span>Back to Orders</span>
        </a>
        <span class="text-sm text-gray-500">Order placed on {{ $order->created_at->format('F d, Y h:i A') }}</span>
    </div>

    <h1 class="text-3xl font-extrabold text-gray-900 mb-4">Order Details</h1>
    <p class="text-sm text-gray-500 mb-8">Review the mangas included in this order and your delivery information.</p>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left: Order + shipping summary -->
        <div class="space-y-4">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-3">Order Summary</h2>
                <p class="text-sm text-gray-700"><span class="font-medium">Order Number:</span> {{ $order->order_number }}</p>
                <p class="text-sm text-gray-700 mt-1">
                    <span class="font-medium">Total Amount:</span>
                    <span class="font-bold text-emerald-600">₱{{ number_format($order->total_amount, 2) }}</span>
                </p>
                <p class="text-sm text-gray-700 mt-1">
                    <span class="font-medium">Status:</span>
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        @if($order->status === 'completed') bg-green-100 text-green-800
                        @elseif($order->status === 'shipped') bg-blue-100 text-blue-800
                        @elseif($order->status === 'paid') bg-yellow-100 text-yellow-800
                        @elseif($order->status === 'pending') bg-gray-100 text-gray-800
                        @else bg-red-100 text-red-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-3">Delivery Details</h2>
                <p class="text-sm text-gray-700">{{ $order->shipping_address }}</p>
                <p class="text-sm text-gray-700">
                    {{ $order->shipping_city }}
                    @if($order->shipping_state) · {{ $order->shipping_state }} @endif
                    {{ $order->shipping_postal_code }}
                </p>
                <p class="text-sm text-gray-700">{{ $order->shipping_country }}</p>
                @if($order->phone)
                    <p class="text-sm text-gray-700 mt-2"><span class="font-medium">Phone:</span> {{ $order->phone }}</p>
                @endif
            </div>
        </div>

        <!-- Right: Order items styled like cart/checkout -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Manga Items</h2>

            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        <!-- Manga Image -->
                        <div class="w-16 h-16 bg-gradient-to-br from-teal-50 to-teal-100 rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($item->product?->image)
                                <img src="{{ $item->product->image }}"
                                     alt="{{ $item->product->name }}"
                                     class="w-full h-full object-cover rounded-lg">
                            @else
                                <div class="text-emerald-400 text-xl font-bold">
                                    {{ mb_substr($item->product?->name ?? 'MG', 0, 2) }}
                                </div>
                            @endif
                        </div>

                        <!-- Manga details -->
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-900">{{ $item->product?->name }}</h3>
                            <p class="text-sm text-gray-500">
                                {{ $item->product?->author }}
                                {!! $item->product?->publisher ? ' · '.$item->product->publisher : '' !!}
                            </p>
                            @if($item->product?->category)
                                <span class="inline-block mt-2 px-2 py-1 bg-teal-100 text-teal-700 text-xs font-medium rounded-full">
                                    {{ $item->product->category->name }}
                                </span>
                            @endif
                        </div>

                        <!-- Price & quantity -->
                        <div class="text-right">
                            <div class="text-sm text-gray-500 mb-1">
                                Quantity: {{ $item->quantity }}
                            </div>
                            <div class="text-sm text-gray-500">
                                ₱{{ number_format($item->price, 2) }} each
                            </div>
                            <div class="font-bold text-lg text-emerald-600">
                                ₱{{ number_format($item->subtotal, 2) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

