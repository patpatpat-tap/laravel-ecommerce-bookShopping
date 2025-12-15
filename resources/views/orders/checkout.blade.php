@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<style>
    body {
        background-color: #ffffff !important;
    }
</style>
@php
    $subtotal     = $cart->total_price;
    $discount     = 0;
    $delivery_fee = 0;
    $total        = $subtotal - $discount + $delivery_fee;
@endphp

<div>
    <!-- Header -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
                    <p class="text-gray-600 mt-1">
                        Complete your order and get your mangas delivered
                    </p>
                </div>
                <a href="{{ route('cart.index') }}"
                   class="text-emerald-600 hover:text-emerald-700 font-medium transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Cart
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Delivery info + order items -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Delivery Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-truck mr-2 text-emerald-600"></i>Delivery Information
                    </h2>

                    <form id="checkout-form"
                          action="{{ route('orders.store') }}"
                          method="POST"
                          class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Delivery Address *
                            </label>
                            <textarea
                                name="shipping_address"
                                required
                                placeholder="Enter your complete delivery address..."
                                rows="3"
                                class="w-full rounded-lg border-gray-300 h-24 resize-none
                                       focus:ring-emerald-500 focus:border-emerald-500">{{ old('shipping_address') }}</textarea>
                            @error('shipping_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    City *
                                </label>
                                <input
                                    type="text"
                                    name="shipping_city"
                                    value="{{ old('shipping_city') }}"
                                    required
                                    placeholder="City / Province"
                                    class="w-full rounded-lg border-gray-300
                                           focus:ring-emerald-500 focus:border-emerald-500">
                                @error('shipping_city')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Postal Code *
                                </label>
                                <input
                                    type="text"
                                    name="shipping_postal_code"
                                    value="{{ old('shipping_postal_code') }}"
                                    required
                                    placeholder="Postal code"
                                    class="w-full rounded-lg border-gray-300
                                           focus:ring-emerald-500 focus:border-emerald-500">
                                @error('shipping_postal_code')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Country *
                                </label>
                                <input
                                    type="text"
                                    name="shipping_country"
                                    value="{{ old('shipping_country') }}"
                                    required
                                    placeholder="Country"
                                    class="w-full rounded-lg border-gray-300
                                           focus:ring-emerald-500 focus:border-emerald-500">
                                @error('shipping_country')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Contact Phone *
                                </label>
                                <input
                                    type="tel"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    required
                                    placeholder="Your phone number"
                                    class="w-full rounded-lg border-gray-300
                                           focus:ring-emerald-500 focus:border-emerald-500">
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Delivery Instructions
                            </label>
                            <input
                                type="text"
                                name="notes"
                                value="{{ old('notes') }}"
                                placeholder="Any special instructions?"
                                class="w-full rounded-lg border-gray-300
                                       focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                                <div class="text-sm text-blue-800">
                                    <p class="font-medium mb-1">Delivery Information</p>
                                    <p>
                                        We’ll deliver your mangas to your specified address.
                                        Our delivery team will contact you when they’re on the way.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Items (Manga) -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-shopping-bag mr-2 text-emerald-600"></i>Order Items
                    </h2>

                    <div class="space-y-4">
                        @foreach($cart->items as $item)
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                                <!-- Manga Image -->
                                <div class="w-16 h-16 bg-gradient-to-br from-teal-50 to-teal-100
                                            rounded-lg flex items-center justify-center flex-shrink-0 overflow-hidden">
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

                                <!-- Manga Details -->
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-900">{{ $item->product?->name }}</h3>
                                    <p class="text-sm text-gray-500">
                                        {{ $item->product?->author }}
                                        {!! $item->product?->publisher ? ' · '.$item->product->publisher : '' !!}
                                    </p>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                </div>

                                <!-- Price -->
                                <div class="text-right">
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

            <!-- Right: Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Order Summary</h2>

                    <!-- Price Breakdown -->
                    <div class="space-y-6 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>₱{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Discount</span>
                            <span class="text-emerald-600">-₱{{ number_format($discount, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Delivery Fee</span>
                            <span>₱{{ number_format($delivery_fee, 2) }}</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between text-lg font-semibold text-gray-900">
                            <span>Total</span>
                            <span>₱{{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" form="checkout-form"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold
                                   py-3 px-4 rounded-lg transition-all duration-200 hover:scale-105 mb-4">
                        <i class="fas fa-credit-card mr-2"></i>Place Order
                    </button>

                    <!-- Security Notice -->
                    <div class="text-center">
                        <div class="flex items-center justify-center text-xs text-gray-500 mb-2">
                            <i class="fas fa-shield-alt mr-1"></i>
                            <span>Secure checkout with SSL encryption</span>
                        </div>
                        <div class="flex items-center justify-center text-xs text-gray-500">
                            <i class="fas fa-truck mr-1"></i>
                            <span>Fast delivery for your mangas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

