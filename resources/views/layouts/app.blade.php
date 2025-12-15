<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Manga Shop')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :host, :root {
            --fa-style-family-classic: "Font Awesome 6 Free";
            --fa-font-solid: normal 900 1em / 1 "Font Awesome 6 Free";
            --fa-font-regular: normal 400 1em / 1 "Font Awesome 6 Free";
            --fa-style-family-brands: "Font Awesome 6 Brands";
            --fa-font-brands: normal 400 1em / 1 "Font Awesome 6 Brands";
            
            /* Elegant Gold, Red & Beige Palette */
            --beige: #F5F5DC;
            --light-beige: #FAF9F6;
            --warm-beige: #E8E4D9;
            --gold: #D4AF37;
            --gold-outline: #D4AF37;
            --dark-gold: #B8860B;
            --red: #EF1B31;
            --dark-red: #C41E3A;
            --text-dark: #2C2C2C;
            --text-light: #4A4A4A;
        }
        body {
            font-family: 'Poppins', 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--beige);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
            position: relative;
        }
        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        .footer-section {
            padding: 4rem 0 2rem;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
        }
        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: var(--light-beige);
            margin: auto;
            padding: 2.5rem;
            border: 2px solid var(--gold-outline);
            border-radius: 16px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
        }
        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .modal-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
            position: relative;
        }
        .modal-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gold);
            margin: 0;
        }
        .close-modal {
            color: var(--text-dark);
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            line-height: 1;
            transition: color 0.2s;
            position: absolute;
            right: 0;
        }
        .close-modal:hover {
            color: var(--red);
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-size: 0.95rem;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--gold-outline);
            border-radius: 8px;
            font-size: 1rem;
            background-color: white;
            color: var(--text-dark);
            transition: all 0.2s;
        }
        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        .form-input.error {
            border-color: var(--red);
        }
        .error-message {
            color: var(--red);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }
        .form-checkbox input {
            width: 1.25rem;
            height: 1.25rem;
            cursor: pointer;
        }
        .form-checkbox label {
            font-size: 0.9rem;
            color: var(--text-light);
            cursor: pointer;
        }
        .btn-modal {
            width: 100%;
            padding: 0.875rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            border: 2px solid;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-modal-primary {
            background-color: var(--gold);
            color: var(--text-dark);
            border-color: var(--gold-outline);
        }
        .btn-modal-primary:hover {
            background-color: var(--dark-gold);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-modal-secondary {
            background-color: #000000;
            color: var(--red);
            border-color: var(--red);
        }
        .btn-modal-secondary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .modal-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-light);
        }
        .modal-footer a {
            color: var(--gold);
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-footer a:hover {
            color: var(--dark-gold);
            text-decoration: underline;
        }
        .modal-link {
            cursor: pointer;
        }
        /* Dashboard Header Styles */
        .dashboard-header {
            background-color: var(--light-beige);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid var(--gold-outline);
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%;
        }
        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--text-dark);
            text-decoration: none;
        }
        .logo-icon {
            width: 3.5rem;
            height: 3.5rem;
            background-color: var(--gold);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .logo-icon:hover {
            background-color: var(--dark-gold);
        }
        .logo-text {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-dark);
        }
        .search-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            width: 100%;
        }
        .dashboard-header .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .search-bar-wrapper {
            display: flex;
            gap: 1rem;
            align-items: center;
            background: white;
            border-radius: 12px;
            padding: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .search-input {
            flex: 1;
            border: none;
            outline: none;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            color: var(--text-dark);
        }
        .category-dropdown {
            border-left: 2px solid var(--gold-outline);
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .category-select {
            border: none;
            outline: none;
            background: transparent;
            font-size: 0.95rem;
            color: var(--text-dark);
            cursor: pointer;
            padding: 0.5rem 0;
        }
        .search-button {
            background-color: var(--red);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }
        .search-button:hover {
            background-color: var(--dark-red);
            transform: translateY(-1px);
        }
        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .cart-icon-wrapper {
            position: relative;
            cursor: pointer;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: transparent;
            border-radius: 8px;
            transition: all 0.2s;
            text-decoration: none;
        }
        .cart-icon-wrapper:hover {
            color: var(--gold);
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
        .user-pill {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: transparent;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            color: var(--text-dark);
            cursor: pointer;
            transition: all 0.2s;
        }
        .user-pill:hover {
            color: var(--gold);
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--gold);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* Hero Button Styles for Nav Bar */
        .btn-hero {
            padding: 0.75rem 1.5rem !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            font-size: 0.95rem !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            background-color: var(--gold) !important;
            color: var(--text-dark) !important;
            border: 2px solid var(--gold-outline) !important;
            cursor: pointer !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        .btn-hero:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            background-color: var(--dark-gold);
            border-color: var(--gold);
            color: var(--text-dark);
        }
        .btn-hero-secondary {
            background-color: #000000 !important;
            color: var(--red) !important;
            border: 2px solid var(--red) !important;
            padding: 0.75rem 1.5rem !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            font-size: 0.95rem !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
            cursor: pointer !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        .btn-hero-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            background-color: #000000;
            border-color: var(--red);
            color: var(--red);
        }
    </style>
</head>
<body>
    @if(request()->routeIs('dashboard'))
        <nav class="dashboard-header">
            <div class="search-container">
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 2rem;">
                    <!-- Logo on the left -->
                    <a href="{{ route('landing') }}" class="logo-section">
                        <div class="logo-icon">
                            <svg style="width: 2rem; height: 2rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <span class="logo-text">Manga Shop</span>
                    </a>

                    <!-- Right Side: Cart, Orders, and User -->
                    <div class="header-right">
                        <!-- Cart Icon -->
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

                        <!-- Orders Button (styled like cart) -->
                        @auth
                            <a href="{{ route('orders.index') }}" class="cart-icon-wrapper">
                                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                                </svg>
                                <span>Orders</span>
                            </a>
                        @endauth

                        <!-- User Pill -->
                        @auth
                            <div class="user-pill">
                                <div class="user-avatar">
                                    <svg style="width: 22px; height: 22px; color: white;" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.33 0-6 2.24-6 5v1h12v-1c0-2.76-2.67-5-6-5z"/>
                                    </svg>
                                </div>
                                <div style="font-weight: 600;">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    @elseif(!request()->routeIs('products.show') && !request()->routeIs('cart.index') && !request()->routeIs('checkout'))
    <nav style="background-color: var(--light-beige); box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); border-bottom: 2px solid var(--gold-outline); position: fixed; top: 0; left: 0; right: 0; z-index: 1000; width: 100%;">
        <div class="nav-container" style="height: 6rem; display: flex; justify-content: space-between; align-items: center;">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('landing') }}" class="logo-section" style="color: var(--text-dark); text-decoration: none;">
                    <div class="logo-icon" style="background-color: var(--gold);">
                        <svg style="width: 2rem; height: 2rem; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="logo-text" style="color: var(--text-dark); font-size: 1.75rem; font-weight: 800;">Manga Shop</span>
                </a>
            </div>
            <div style="display: flex; align-items: center; gap: 1rem; flex-shrink: 0;">
                @guest
                    <button type="button" onclick="openModal('loginModal')" class="btn-hero" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important; margin: 0 !important;">Sign In</button>
                    <button type="button" onclick="openModal('registerModal')" class="btn-hero-secondary" style="display: inline-flex !important; visibility: visible !important; opacity: 1 !important; margin: 0 !important;">Sign Up</button>
                @endguest
            </div>
        </div>
    </nav>
    @endunless

    @if(session('success'))
        <div class="px-4 py-3 rounded relative max-w-7xl mx-auto mt-4" role="alert" style="background-color: rgba(212, 175, 55, 0.1); border: 2px solid var(--gold); color: var(--gold);">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="px-4 py-3 rounded relative max-w-7xl mx-auto mt-4" role="alert" style="background-color: rgba(239, 27, 49, 0.1); border: 2px solid var(--red); color: var(--red);">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <main style="padding-top: 6rem;">
        @yield('content')
    </main>

    <!-- Login Modal -->
    <div id="loginModal" class="modal" onclick="if(event.target === this) closeModal('loginModal')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h2 class="modal-title">Sign In</h2>
                <button class="close-modal" onclick="closeModal('loginModal')">&times;</button>
            </div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="login_email" class="form-label">Email</label>
                    <input type="email" name="email" id="login_email" class="form-input" autocomplete="email" required>
                    <div id="login_email_error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="login_password" class="form-label">Password</label>
                    <input type="password" name="password" id="login_password" class="form-input" autocomplete="current-password" required>
                    <div id="login_password_error" class="error-message"></div>
                </div>
                <button type="submit" class="btn-modal btn-modal-primary">Sign In</button>
            </form>
            <div class="modal-footer">
                Don't have an account? <a onclick="closeModal('loginModal'); openModal('registerModal');" class="modal-link">Sign up here</a>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal" onclick="if(event.target === this) closeModal('registerModal')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h2 class="modal-title">Sign Up</h2>
                <button class="close-modal" onclick="closeModal('registerModal')">&times;</button>
            </div>
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="register_name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="register_name" class="form-input" autocomplete="name" required>
                    <div id="register_name_error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="register_email" class="form-label">Email</label>
                    <input type="email" name="email" id="register_email" class="form-input" autocomplete="email" required>
                    <div id="register_email_error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="register_password" class="form-label">Password</label>
                    <input type="password" name="password" id="register_password" class="form-input" autocomplete="new-password" required>
                    <div id="register_password_error" class="error-message"></div>
                </div>
                <button type="submit" class="btn-modal btn-modal-primary">Sign Up</button>
            </form>
            <div class="modal-footer">
                Already have an account? <a onclick="closeModal('registerModal'); openModal('loginModal');" class="modal-link">Sign in here</a>
            </div>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
                clearErrors(modalId);
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('show');
                document.body.style.overflow = '';
                const form = modal.querySelector('form');
                if (form) form.reset();
                clearErrors(modalId);
            }
        }

        function clearErrors(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            modal.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            modal.querySelectorAll('.form-input.error').forEach(el => el.classList.remove('error'));
        }

        function showErrors(modalId, errors) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            Object.keys(errors || {}).forEach(field => {
                const input = modal.querySelector(`[name="${field}"]`);
                if (input) input.classList.add('error');
                const errDiv = modal.querySelector(`#${modalId === 'loginModal' ? 'login' : 'register'}_${field}_error`);
                if (errDiv) errDiv.textContent = errors[field]?.[0] || '';
            });
        }

        async function submitForm(form, modalId) {
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton?.textContent;
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Please wait...';
            }
            clearErrors(modalId);

            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: { 
                        'X-CSRF-TOKEN': csrfToken, 
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin',
                    body: formData
                });
                
                // Handle redirects (302, 301, etc.) - means login was successful
                // When redirect is not manual, fetch follows redirects automatically
                // So if we get here with status 200, check if it's JSON or HTML
                if (response.status >= 300 && response.status < 400) {
                    // Redirect received - get Location header
                    const redirectUrl = response.headers.get('Location') || '/dashboard';
                    closeModal(modalId);
                    window.location.href = redirectUrl.startsWith('http') ? redirectUrl : window.location.origin + redirectUrl;
                    return;
                }
                
                // Check if response is JSON
                const contentType = response.headers.get('content-type') || '';
                if (!contentType.includes('application/json')) {
                    // If we get HTML instead of JSON, try to parse it
                    // This might happen if the server doesn't detect JSON request properly
                    const text = await response.text();
                    
                    // If response contains dashboard content, login was successful
                    if (text.includes('dashboard') || text.includes('Dashboard') || 
                        text.includes('Manga Shop') || response.status === 200) {
                        closeModal(modalId);
                        // Try to extract redirect URL from response if possible
                        const dashboardMatch = text.match(/href=["']([^"']*\/dashboard[^"']*)["']/);
                        const redirectUrl = dashboardMatch ? dashboardMatch[1] : '/dashboard';
                        window.location.href = redirectUrl;
                        return;
                    }
                    
                    // If it's a validation error page or contains error messages
                    if (text.includes('credentials') || text.includes('error') || response.status === 422) {
                        showErrors(modalId, { email: ['The provided credentials do not match our records.'] });
                        return;
                    }
                    
                    // Unknown response - log it and show error
                    console.error('Unexpected response type:', contentType, 'Status:', response.status);
                    showErrors(modalId, { email: ['An error occurred. Please try again.'] });
                    return;
                }
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    closeModal(modalId);
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        window.location.reload();
                    }
                } else if (response.status === 422) {
                    // Validation errors
                    if (data.errors) {
                        showErrors(modalId, data.errors);
                    } else if (data.message) {
                        showErrors(modalId, { email: [data.message] });
                    } else {
                        showErrors(modalId, { email: ['Please check your input and try again.'] });
                    }
                } else if (data.message) {
                    showErrors(modalId, { email: [data.message] });
                } else {
                    showErrors(modalId, { email: ['An error occurred. Please try again.'] });
                }
            } catch (e) {
                console.error('Login error:', e);
                // If error message contains HTML (dashboard page), login was successful
                if (e.message && (e.message.includes('dashboard') || e.message.includes('Dashboard') || e.message.includes('<!DOCTYPE html>'))) {
                    closeModal(modalId);
                    window.location.href = '/dashboard';
                    return;
                }
                // Check if it's a validation error
                if (e.name === 'ValidationException' || e.message.includes('credentials')) {
                    showErrors(modalId, { email: ['The provided credentials do not match our records.'] });
                } else {
                    showErrors(modalId, { email: ['An error occurred. Please try again.'] });
                }
            } finally {
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            if (loginForm) {
                loginForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    submitForm(loginForm, 'loginModal');
                });
            }
            if (registerForm) {
                registerForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    submitForm(registerForm, 'registerModal');
                });
            }

            // Close on Escape
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    ['loginModal','registerModal'].forEach(closeModal);
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>

