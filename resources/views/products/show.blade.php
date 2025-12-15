@extends('layouts.app')

@section('title', $product->name)

@section('content')
<style>
    .qty-wrap {
        display: inline-flex;
        align-items: center;
        border: 1px solid #cbd5e0;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }
    .qty-btn {
        width: 38px;
        height: 38px;
        border: none;
        background: #f8fafc;
        font-size: 1.1rem;
        cursor: pointer;
    }
    .qty-input {
        width: 48px;
        height: 38px;
        text-align: center;
        border: 1px solid #cbd5e0;
        border-top: 0;
        border-bottom: 0;
        outline: none;
    }
    .add-cart-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.9rem 1.2rem;
        background: #0d9a8c;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-weight: 800;
        box-shadow: 0 6px 14px rgba(13,154,140,0.18);
        cursor: pointer;
    }
    .product-hero-header {
        background: linear-gradient(135deg, var(--gold) 0%, var(--dark-gold) 100%);
        padding: 1.4rem 2rem;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1100;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    .product-hero-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1.5rem;
    }
    .logo-section {
        display: flex;
        align-items: center;
        gap: 1rem;
        color: white;
        text-decoration: none;
        font-weight: 800;
        font-size: 1.2rem;
    }
    .logo-icon {
        width: 3.5rem;
        height: 3.5rem;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        color: white;
    }
    .logo-icon:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }
    .logo-text {
        font-size: 1.75rem;
        font-weight: 800;
        color: white;
    }
    .hero-actions {
        display: flex;
        align-items: center;
        gap: 1.2rem;
        color: white;
        font-weight: 700;
    }
    .hero-pill {
        background: rgba(255, 255, 255, 0.18);
        padding: 0.55rem 0.9rem;
        border-radius: 999px;
    }
    .cart-icon-wrapper {
        position: relative;
        cursor: pointer;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        transition: all 0.2s;
        text-decoration: none;
    }
    .cart-icon-wrapper:hover {
        background: rgba(255, 255, 255, 0.3);
    }
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: var(--red);
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: bold;
    }
    .page-spacer {
        height: 120px;
    }
    /* hide default nav on product page to avoid double headers */
    nav {
        display: none;
    }
</style>

<div class="product-hero-header">
    <div class="product-hero-container">
        <a href="{{ route('landing') }}" class="logo-section">
            <div class="logo-icon">
                <svg style="width: 2rem; height: 2rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <span class="logo-text">Manga Shop</span>
        </a>
        <div class="hero-actions">
            <a href="{{ route('cart.index') }}" class="cart-icon-wrapper">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span>Cart</span>
                @auth
                    @if(auth()->user()->cart && auth()->user()->cart->items->count() > 0)
                        <span class="cart-badge">{{ auth()->user()->cart->items->sum('quantity') }}</span>
                    @endif
                @endauth
            </a>
            @auth
                <div class="hero-pill">{{ auth()->user()->name }}</div>
            @else
                <a href="{{ route('login') }}" style="color: white; text-decoration: none;">Login</a>
            @endauth
        </div>
    </div>
</div>

<div class="page-spacer"></div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="grid md:grid-cols-2 gap-10 p-8">
            <div class="flex justify-center items-center bg-[#f9f7e7] rounded-xl p-4">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full max-h-[620px] object-contain rounded-lg bg-white">
                @else
                    <div class="w-full h-[520px] bg-gray-200 flex items-center justify-center rounded-lg">
                        <span class="text-gray-400 text-xl">No Image</span>
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full font-semibold">{{ $product->category->name }}</span>
                    @if($product->publisher)
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full">Publisher: {{ $product->publisher }}</span>
                    @endif
                </div>

                <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $product->name }}</h1>

                <div class="flex flex-wrap gap-4 text-gray-700">
                    @if($product->author)
                        <div><span class="font-semibold">Author:</span> {{ $product->author }}</div>
                    @endif
                    @if($product->pages)
                        <div><span class="font-semibold">Pages:</span> {{ $product->pages }}</div>
                    @endif
                </div>

                <div class="text-3xl font-black text-emerald-600">₱{{ number_format($product->price, 2) }}</div>

                @if($product->description)
                    <div class="space-y-1">
                        <h2 class="text-lg font-semibold text-gray-900">Description</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                <div class="text-md">
                    @if($product->stock > 0)
                        <span class="text-emerald-600 font-semibold">{{ $product->stock }} available</span>
                    @else
                        <span class="text-red-600 font-semibold">Out of Stock</span>
                    @endif
                </div>

                @auth
                    @if($product->stock > 0)
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <form method="POST" action="{{ route('cart.add', $product) }}" class="flex flex-wrap items-center gap-4">
                                @csrf
                                <div class="flex items-center gap-3 text-sm font-medium text-gray-700">
                                    Quantity:
                                    <div class="qty-wrap">
                                        <button type="button" id="qty-minus" class="qty-btn">-</button>
                                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="qty-input" />
                                        <button type="button" id="qty-plus" class="qty-btn">+</button>
                                    </div>
                                </div>
                                <button type="submit" class="add-cart-btn">
                                    <span style="font-size:1.05rem;">🛍</span> Add to Cart
                                </button>
                            </form>
                        </div>
                    @else
                        <button disabled class="px-6 py-3 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                            Out of Stock
                        </button>
                    @endif
                @else
                    <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-emerald-700 font-semibold hover:underline">login</a> to add items to cart.</p>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const minus = document.getElementById('qty-minus');
        const plus = document.getElementById('qty-plus');
        const qty = document.getElementById('quantity');
        if (minus && plus && qty) {
            minus.addEventListener('click', () => {
                const val = Math.max(1, parseInt(qty.value || '1', 10) - 1);
                qty.value = val;
            });
            plus.addEventListener('click', () => {
                const max = parseInt(qty.getAttribute('max') || '9999', 10);
                const val = Math.min(max, parseInt(qty.value || '1', 10) + 1);
                qty.value = val;
            });
        }
    });
</script>
@endpush

