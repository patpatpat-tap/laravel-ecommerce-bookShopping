@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .section-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 2rem;
    }
    .view-all-link {
        font-size: 1rem;
        color: var(--gold);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }
    .view-all-link:hover {
        color: var(--dark-gold);
        text-decoration: underline;
    }
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }
    .product-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    .product-image {
        width: 100%;
        height: 260px;
        object-fit: cover;
        background: var(--light-beige);
    }
    .product-image-placeholder {
        width: 100%;
        height: 260px;
        background: var(--light-beige);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
    }
    .product-info {
        padding: 1.25rem;
    }
    .product-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .product-price {
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--gold);
        margin-bottom: 0.75rem;
    }
    .product-status {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    .status-sold-out {
        background-color: rgba(239, 27, 49, 0.1);
        color: var(--red);
    }
    .status-available {
        background-color: rgba(212, 175, 55, 0.1);
        color: var(--dark-gold);
    }
    .status-preorder {
        background-color: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
    }
    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }
    .status-dot.sold-out {
        background-color: var(--red);
    }
    .status-dot.available {
        background-color: var(--dark-gold);
    }
    .status-dot.preorder {
        background-color: #3b82f6;
    }
    .no-products {
        text-align: center;
        padding: 3rem;
        color: var(--text-light);
        font-size: 1.1rem;
    }
    /* Add padding to content to account for fixed header */
    .dashboard-content {
        margin-top: 0;
        width: 100%;
        max-width: 100%;
        padding: 0;
    }
    
    /* Featured Section - Two Column Layout (30% / 70%) */
    .featured-heading {
        font-size: 2rem;
        font-weight: 900;
        color: var(--text-dark);
        margin: 3rem 0 1rem 0;
        padding: 0 2rem;
    }
    .featured-section {
        margin-top: 0.5rem;
        margin-bottom: 3.5rem;
        background: white;
        border-radius: 20px;
        padding: 2.5rem 2.75rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        margin-left: 2rem;
        margin-right: 2rem;
    }
    .featured-container {
        display: grid;
        grid-template-columns: 32% 68%;
        gap: 2rem;
        align-items: center;
    }
    
    /* Left Column - Article */
    .featured-article {
        display: flex;
        flex-direction: column;
    }
    .featured-series-title {
        font-size: 2.2rem;
        font-weight: 900;
        color: var(--red);
        margin-bottom: 0.35rem;
        line-height: 1.1;
    }
    .featured-series-subtitle {
        font-size: 1.05rem;
        color: var(--red);
        margin-bottom: 1rem;
        font-weight: 600;
    }
    .featured-illustration {
        width: 100%;
        height: 460px;
        background: var(--light-beige);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: auto;
        overflow: hidden;
        padding: 1rem;
    }
    .featured-illustration img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* show full image */
        border-radius: 12px;
        background: white;
    }
    
    /* Right Column - Volumes Carousel */
    .featured-volumes-wrapper {
        position: relative;
        width: 100%;
        padding: 0 3rem; /* Space for arrows */
        overflow: visible;
    }
    .featured-volumes {
        display: flex;
        gap: 1.25rem;
        align-items: start;
        overflow-x: auto;
        overflow-y: hidden;
        scroll-behavior: smooth;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
        width: 100%;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
    }
    .featured-volumes::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }
    .featured-volume-card {
        flex: 0 0 calc(33.333% - 1rem);
        min-width: calc(33.333% - 1rem);
        max-width: calc(33.333% - 1rem);
    }
    .carousel-nav-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: var(--gold);
        color: white;
        border: none;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        z-index: 10;
    }
    .carousel-nav-button:hover:not(:disabled) {
        background: var(--dark-gold);
        transform: translateY(-50%) scale(1.1);
    }
    .carousel-nav-button:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }
    .carousel-nav-button.prev {
        left: 0;
    }
    .carousel-nav-button.next {
        right: 0;
    }
    .featured-volume-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid transparent;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .featured-volume-link {
        display: block;
        color: inherit;
        text-decoration: none;
    }
    .featured-volume-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 26px rgba(0, 0, 0, 0.14);
        border-color: var(--gold);
    }
    .featured-volume-image {
        width: 100%;
        height: 320px;
        object-fit: cover; /* fill card like products */
        background: var(--light-beige);
        padding: 0;
    }
    .featured-volume-image-placeholder {
        width: 100%;
        height: 320px;
        background: var(--light-beige);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        font-size: 0.9rem;
    }
    .featured-volume-info {
        padding: 1.1rem 1.1rem 1.25rem 1.1rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    .featured-volume-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 0.6rem;
        line-height: 1.35;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .featured-volume-price {
        font-size: 1.15rem;
        font-weight: 900;
        color: var(--gold);
        margin-bottom: 0.6rem;
    }
    .quick-view-btn {
        margin-top: auto;
        background-color: var(--gold);
        color: var(--text-dark);
        border: none;
        border-radius: 12px;
        padding: 0.65rem 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        width: 100%;
        text-align: center;
    }
    .quick-view-btn:hover {
        background-color: var(--dark-gold);
        color: var(--text-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .featured-volume-status {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    /* Responsive Design */
    @media (max-width: 1024px) {
        .featured-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .featured-volume-card {
            flex: 0 0 calc(50% - 0.75rem);
            min-width: calc(50% - 0.75rem);
        }
        .featured-series-title {
            font-size: 2.5rem;
        }
        .featured-volumes-wrapper {
            padding: 0 2.5rem;
        }
        .carousel-nav-button.prev {
            left: 0;
        }
        .carousel-nav-button.next {
            right: 0;
        }
    }
    
    @media (max-width: 768px) {
        .featured-section {
            padding: 2rem;
        }
        .featured-volume-card {
            flex: 0 0 calc(50% - 0.75rem);
            min-width: calc(50% - 0.75rem);
        }
        .featured-series-title {
            font-size: 2rem;
        }
        .featured-series-subtitle {
            font-size: 1.1rem;
        }
        .featured-illustration {
            height: 250px;
        }
        .featured-volumes-wrapper {
            padding: 0 2rem;
        }
        .carousel-nav-button {
            width: 40px;
            height: 40px;
        }
        .carousel-nav-button.prev {
            left: 0;
        }
        .carousel-nav-button.next {
            right: 0;
        }
    }
    
    @media (max-width: 640px) {
        .featured-volume-card {
            flex: 0 0 calc(100% - 0.5rem);
            min-width: calc(100% - 0.5rem);
        }
    }
    
    /* Regular Product Grid - Full Width */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1.5rem;
        margin-bottom: 4rem;
        width: 100%;
        padding: 0 2rem;
    }
    /* Hero Section Styles */
    .hero-section {
        background: linear-gradient(135deg, var(--gold) 0%, var(--dark-gold) 100%);
        color: white;
        padding: 4rem 0;
        margin-bottom: 3rem;
    }
    .hero-content {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-align: center;
    }
    .hero-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2rem;
        text-align: center;
    }
    .hero-search-form {
        max-width: 800px;
        margin: 0 auto;
    }
    .hero-search-wrapper {
        position: relative;
        display: flex;
        gap: 0.5rem;
        align-items: center;
        background: white;
        border-radius: 12px;
        padding: 0.5rem;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }
    .hero-search-input {
        flex: 1;
        border: none;
        outline: none;
        padding: 1rem 1.5rem;
        font-size: 1.1rem;
        color: var(--text-dark);
        background: transparent;
    }
    .hero-search-input::placeholder {
        color: var(--text-light);
    }
    .hero-category-select {
        border-left: 2px solid var(--gold-outline);
        padding-left: 1rem;
        padding-right: 1rem;
        border: none;
        outline: none;
        background: transparent;
        font-size: 1rem;
        color: var(--text-dark);
        cursor: pointer;
    }
    .hero-search-button {
        background-color: var(--red);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .hero-search-button:hover {
        background-color: var(--dark-red);
        transform: translateY(-1px);
    }
</style>

<div class="dashboard-content">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="text-center">
                <h1 class="hero-title">Find Your Manga</h1>
                <p class="hero-subtitle">Browse our comprehensive catalog of manga and discover your next favorite series</p>
                
                <!-- Search Bar -->
                <form method="GET" action="{{ route('dashboard') }}" class="hero-search-form">
                    <div class="hero-search-wrapper">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ $searchQuery }}" 
                            placeholder="Search manga, titles, authors, or series..." 
                            class="hero-search-input"
                        >
                        <select name="category" class="hero-category-select">
                            <option value="">All categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="hero-search-button">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($searchQuery)
        <!-- Search Results -->
        <div class="section-title">
            <span>Search Results for "{{ $searchQuery }}"</span>
        </div>
        @if($searchResults->count() > 0)
            <div class="products-grid">
                @foreach($searchResults as $product)
                    <a href="{{ route('products.show', $product) }}" class="product-card">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <div class="product-image-placeholder">
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                            <div class="product-status {{ $product->stock <= 0 ? 'status-sold-out' : 'status-available' }}">
                                <span class="status-dot {{ $product->stock <= 0 ? 'sold-out' : 'available' }}"></span>
                                {{ $product->stock <= 0 ? 'Sold out' : 'On hand' }}
                            </div>
                        </div>
                        <button type="button"
                            class="quick-view-btn"
                            data-product="{{ json_encode([
                                'id' => $product->id,
                                'name' => $product->name,
                                'price' => $product->price,
                                'image' => $product->image,
                                'url' => route('products.show', $product),
                                'stock' => $product->stock,
                                'cart_url' => route('cart.add', $product),
                            ]) }}">
                            Quick add
                        </button>
                    </a>
                @endforeach
            </div>
        @else
            <div class="no-products">
                <p>No products found matching your search.</p>
            </div>
        @endif
    @else
        <!-- Featured Section (Two Column: Article + Volumes) -->
        @if($featuredSeriesProducts && $featuredSeriesProducts->count() > 0 && $featuredProduct)
            <div class="featured-heading">Featured Manga</div>
            <div class="featured-section">
                <div class="featured-container">
                    <!-- Left Column - Article -->
                    <div class="featured-article">
                        <h1 class="featured-series-title">{{ $featuredSeriesName }}</h1>
                        @if($featuredProduct->description)
                            <p class="featured-series-subtitle">{{ $featuredProduct->description }}</p>
                        @else
                            <p class="featured-series-subtitle">Discover the latest volumes of {{ $featuredSeriesName }} and continue your collection!</p>
                        @endif
                        @if($featuredProduct->image)
                            <div class="featured-illustration">
                                <img src="{{ $featuredProduct->image }}" alt="{{ $featuredSeriesName }}">
                            </div>
                        @else
                            <div class="featured-illustration">
                                <span style="color: var(--text-light); font-size: 1.1rem;">Illustration</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Right Column - Volumes Carousel -->
                    <div class="featured-volumes-wrapper">
                        <button type="button" class="carousel-nav-button prev" data-direction="prev" aria-label="Previous volumes">
                            <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <div class="featured-volumes" id="featuredVolumesCarousel">
                            @foreach($featuredSeriesProducts as $product)
                            <div class="featured-volume-card">
                                <a href="{{ route('products.show', $product) }}" class="featured-volume-link">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="featured-volume-image">
                                    @else
                                        <div class="featured-volume-image-placeholder">
                                            <span>No Image</span>
                                        </div>
                                    @endif
                                    <div class="featured-volume-info">
                                        <h3 class="featured-volume-title">{{ $product->name }}</h3>
                                        <div class="featured-volume-price">₱{{ number_format($product->price, 2) }}</div>
                                        <div class="featured-volume-status {{ $product->stock <= 0 ? 'status-sold-out' : 'status-available' }}">
                                            <span class="status-dot {{ $product->stock <= 0 ? 'sold-out' : 'available' }}"></span>
                                            {{ $product->stock <= 0 ? 'Sold out' : ($product->stock < 5 ? 'Special Order' : 'On hand') }}
                                        </div>
                                    </div>
                                </a>
                                <button type="button"
                                    class="quick-view-btn"
                                    data-product="{{ json_encode([
                                        'id' => $product->id,
                                        'name' => $product->name,
                                        'price' => $product->price,
                                        'image' => $product->image,
                                        'url' => route('products.show', $product),
                                        'stock' => $product->stock,
                                        'cart_url' => route('cart.add', $product),
                                    ]) }}">
                                    Quick add
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" class="carousel-nav-button next" data-direction="next" aria-label="Next volumes">
                            <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <!-- This Month's New Release -->
        <div class="section-title">
            <span>This Month's New Release</span>
            <a href="{{ route('home') }}" class="view-all-link">View all</a>
        </div>
        @if($monthlyReleases->count() > 0)
            <div class="products-grid">
                @foreach($monthlyReleases as $product)
                    <a href="{{ route('products.show', $product) }}" class="product-card">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <div class="product-image-placeholder">
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                            <div class="product-status {{ $product->stock <= 0 ? 'status-sold-out' : 'status-available' }}">
                                <span class="status-dot {{ $product->stock <= 0 ? 'sold-out' : 'available' }}"></span>
                                {{ $product->stock <= 0 ? 'Sold out' : 'On hand' }}
                            </div>
                        </div>
                        <button type="button"
                            class="quick-view-btn"
                            data-product="{{ json_encode([
                                'id' => $product->id,
                                'name' => $product->name,
                                'price' => $product->price,
                                'image' => $product->image,
                                'url' => route('products.show', $product),
                                'stock' => $product->stock,
                                'cart_url' => route('cart.add', $product),
                            ]) }}">
                            Quick add
                        </button>
                    </a>
                @endforeach
            </div>
        @else
            <div class="no-products">
                <p>No new releases this month.</p>
            </div>
        @endif

        <!-- Newly Added Mangas -->
        <div class="section-title">
            <span>Newly Added Mangas</span>
            <a href="{{ route('home') }}" class="view-all-link">View all</a>
        </div>
        @if($newlyAdded->count() > 0)
            <div class="products-grid">
                @foreach($newlyAdded as $product)
                    <a href="{{ route('products.show', $product) }}" class="product-card">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <div class="product-image-placeholder">
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="product-info">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <div class="product-price">₱{{ number_format($product->price, 2) }}</div>
                            <div class="product-status {{ $product->stock <= 0 ? 'status-sold-out' : 'status-available' }}">
                                <span class="status-dot {{ $product->stock <= 0 ? 'sold-out' : 'available' }}"></span>
                                {{ $product->stock <= 0 ? 'Sold out' : 'On hand' }}
                            </div>
                        <button type="button"
                            class="quick-view-btn"
                            data-product="{{ json_encode([
                                'id' => $product->id,
                                'name' => $product->name,
                                'price' => $product->price,
                                'image' => $product->image,
                                'url' => route('products.show', $product),
                                'stock' => $product->stock,
                                'cart_url' => route('cart.add', $product),
                            ]) }}">
                            Quick add
                        </button>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="no-products">
                <p>No newly added mangas available.</p>
            </div>
        @endif
    @endif
</div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.createElement('div');
        modal.id = 'quickViewModal';
        modal.style.display = 'none';
        modal.innerHTML = `
            <div style="
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.5);
                z-index: 3000;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
            ">
                <div style="
                    background: white;
                    border-radius: 16px;
                    width: min(900px, 100%);
                    max-height: 90vh;
                    overflow: auto;
                    padding: 1.75rem;
                    box-shadow: 0 10px 32px rgba(0,0,0,0.2);
                ">
                    <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
                        <div style="flex: 1 1 320px; display: flex; justify-content: center; align-items: center; background: #f9f9f3; border-radius: 12px; padding: 1rem;">
                            <img id="qv-image" src="" alt="" style="width: 100%; height: 100%; max-height: 480px; object-fit: contain; border-radius: 8px; background: white;">
                        </div>
                        <div style="flex: 1 1 300px; display: flex; flex-direction: column; gap: 0.75rem;">
                            <h2 id="qv-name" style="font-size: 1.6rem; font-weight: 800; margin: 0;"></h2>
                            <div id="qv-price" style="font-size: 1.4rem; font-weight: 900; color: var(--gold);"></div>
                            <a id="qv-link" href="#" style="color: var(--red); font-weight: 700; text-decoration: none;">View full details</a>
                            <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem;">
                                <div style="font-weight: 700;">Quantity:</div>
                                <div style="display: flex; align-items: center; border: 2px solid #ddd; border-radius: 10px; overflow: hidden;">
                                    <button type="button" id="qv-minus" style="width: 40px; height: 40px; border: none; background: #f5f5f5; font-size: 1.25rem; cursor: pointer;">-</button>
                                    <input type="number" id="qv-qty" value="1" min="1" style="width: 60px; height: 40px; border: none; text-align: center; font-weight: 700;">
                                    <button type="button" id="qv-plus" style="width: 40px; height: 40px; border: none; background: #f5f5f5; font-size: 1.25rem; cursor: pointer;">+</button>
                                </div>
                            </div>
                            <button id="qv-add" type="button" style="
                                margin-top: 0.5rem;
                                background: #0d9a8c;
                                color: white;
                                border: none;
                                border-radius: 12px;
                                padding: 0.9rem 1.2rem;
                                font-weight: 800;
                                font-size: 1rem;
                                cursor: pointer;
                                display: inline-flex;
                                align-items: center;
                                gap: 0.5rem;
                            ">
                                <span style="font-size: 1.1rem;">🛒</span> Add to Cart
                            </button>
                            <div id="qv-status" style="font-size: 0.95rem; color: #777;"></div>
                        </div>
                    </div>
                    <button id="qv-close" type="button" style="
                        position: absolute;
                        top: 12px;
                        right: 12px;
                        background: none;
                        border: none;
                        font-size: 1.5rem;
                        cursor: pointer;
                    ">&times;</button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);

        let currentProduct = null;

        function openModal(data) {
            currentProduct = data;
            document.getElementById('qv-name').textContent = data.name;
            document.getElementById('qv-price').textContent = `₱${Number(data.price).toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
            document.getElementById('qv-link').href = data.url;
            document.getElementById('qv-image').src = data.image || '';
            document.getElementById('qv-qty').value = 1;
            document.getElementById('qv-status').textContent = data.stock <= 0 ? 'Out of stock' : (data.stock < 5 ? 'Special Order' : 'On hand');
            modal.style.display = 'flex';
        }

        function closeModal() {
            modal.style.display = 'none';
            currentProduct = null;
        }

        document.getElementById('qv-close').addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
        document.getElementById('qv-minus').addEventListener('click', () => {
            const qty = document.getElementById('qv-qty');
            qty.value = Math.max(1, parseInt(qty.value || '1', 10) - 1);
        });
        document.getElementById('qv-plus').addEventListener('click', () => {
            const qty = document.getElementById('qv-qty');
            qty.value = Math.max(1, parseInt(qty.value || '1', 10) + 1);
        });

        document.querySelectorAll('.quick-view-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const data = JSON.parse(btn.getAttribute('data-product'));
                openModal(data);
            });
        });

        document.getElementById('qv-add').addEventListener('click', async () => {
            if (!currentProduct) return;
            const qty = Math.max(1, parseInt(document.getElementById('qv-qty').value || '1', 10));
            try {
                await axios.post(currentProduct.cart_url, { quantity: qty });
                document.getElementById('qv-add').textContent = 'Added!';
                setTimeout(() => {
                    document.getElementById('qv-add').textContent = 'Add to Cart';
                    closeModal();
                    window.location.reload();
                }, 600);
            } catch (err) {
                alert('Unable to add to cart. Please try again.');
            }
        });
    });

    // Featured Volumes Carousel Functionality - Make it globally accessible
    window.slideFeaturedVolumes = function(direction) {
        console.log('slideFeaturedVolumes called with direction:', direction);
        const carousel = document.getElementById('featuredVolumesCarousel');
        if (!carousel) {
            console.error('Carousel not found');
            return;
        }

        const firstCard = carousel.querySelector('.featured-volume-card');
        if (!firstCard) {
            console.error('No cards found in carousel');
            return;
        }

        const cardWidth = firstCard.offsetWidth;
        const gap = 20; // 1.25rem = 20px
        const scrollAmount = (cardWidth + gap) * 3; // Scroll 3 cards at a time
        
        console.log('Card width:', cardWidth, 'Scroll amount:', scrollAmount, 'Current scroll:', carousel.scrollLeft);

        if (direction === 'next') {
            const newScroll = carousel.scrollLeft + scrollAmount;
            console.log('Scrolling next to:', newScroll);
            carousel.scrollTo({
                left: newScroll,
                behavior: 'smooth'
            });
        } else if (direction === 'prev') {
            const newScroll = carousel.scrollLeft - scrollAmount;
            console.log('Scrolling prev to:', newScroll);
            carousel.scrollTo({
                left: Math.max(0, newScroll),
                behavior: 'smooth'
            });
        }

        // Update button states after a short delay
        setTimeout(() => {
            window.updateCarouselButtons();
        }, 300);
    };

    window.updateCarouselButtons = function() {
        const carousel = document.getElementById('featuredVolumesCarousel');
        if (!carousel) return;

        const prevButton = carousel.closest('.featured-volumes-wrapper')?.querySelector('.carousel-nav-button.prev');
        const nextButton = carousel.closest('.featured-volumes-wrapper')?.querySelector('.carousel-nav-button.next');

        if (prevButton && nextButton) {
            // Check if we're at the start
            prevButton.disabled = carousel.scrollLeft <= 10;
            
            // Check if we're at the end
            const maxScroll = carousel.scrollWidth - carousel.clientWidth;
            nextButton.disabled = carousel.scrollLeft >= maxScroll - 10; // 10px tolerance
        }
    };

    // Initialize carousel buttons on load
    document.addEventListener('DOMContentLoaded', () => {
        console.log('DOMContentLoaded - Initializing carousel');
        const carousel = document.getElementById('featuredVolumesCarousel');
        console.log('Carousel element:', carousel);
        
        if (carousel) {
            // Add event listeners to navigation buttons
            const wrapper = carousel.closest('.featured-volumes-wrapper');
            console.log('Wrapper element:', wrapper);
            
            const prevButton = wrapper?.querySelector('.carousel-nav-button.prev');
            const nextButton = wrapper?.querySelector('.carousel-nav-button.next');
            
            console.log('Prev button:', prevButton);
            console.log('Next button:', nextButton);
            console.log('slideFeaturedVolumes function:', typeof window.slideFeaturedVolumes);
            
            if (prevButton) {
                prevButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Prev button clicked');
                    if (window.slideFeaturedVolumes) {
                        window.slideFeaturedVolumes('prev');
                    } else {
                        console.error('slideFeaturedVolumes function not found');
                    }
                });
            } else {
                console.error('Prev button not found');
            }
            
            if (nextButton) {
                nextButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Next button clicked');
                    if (window.slideFeaturedVolumes) {
                        window.slideFeaturedVolumes('next');
                    } else {
                        console.error('slideFeaturedVolumes function not found');
                    }
                });
            } else {
                console.error('Next button not found');
            }
            
            window.updateCarouselButtons();
            
            // Update buttons on scroll
            carousel.addEventListener('scroll', () => {
                window.updateCarouselButtons();
            });
            
            // Update on window resize
            window.addEventListener('resize', () => {
                window.updateCarouselButtons();
            });
        } else {
            console.error('Carousel element not found');
        }
    });
</script>
@endpush

