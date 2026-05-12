@extends('frontend.master')

@section('content')
@php
    $site = $globalWebsiteSetting ?? null;
    $siteName = $site?->site_name ?? trans('panel.site_title');
    $siteLogo = $site?->logo ? asset('uploads/settings/' . $site->logo) : asset('assets/img/logo-1.png');
@endphp

<section class="auth-page-section">
    <span class="auth-bg-shape auth-shape-one"></span>
    <span class="auth-bg-shape auth-shape-two"></span>

    <div class="container">
        <div class="auth-shell">
            <div class="auth-intro-panel">
                <span class="section-badge auth-badge">
                    <i class="bi bi-shield-lock-fill"></i>
                    Member Access
                </span>

                <h1>Welcome Back</h1>
                <p>
                    Login to manage your URMILA Development Foundation account and continue supporting community welfare work.
                </p>

                <div class="auth-feature-list">
                    <div><i class="bi bi-check-circle-fill"></i><span>Secure account access</span></div>
                    <div><i class="bi bi-check-circle-fill"></i><span>Manage admin activities</span></div>
                    <div><i class="bi bi-check-circle-fill"></i><span>Stay connected with the mission</span></div>
                </div>
            </div>

            <div class="auth-card">
                <div class="auth-brand">
                    <img src="{{ $siteLogo }}" alt="{{ $siteName }}">
                    <div>
                        <h2>{{ $siteName }}</h2>
                        <span>{{ trans('global.login') }}</span>
                    </div>
                </div>

                @if(session('message'))
                    <div class="alert alert-info auth-alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf

                    <div class="auth-field">
                        <label for="email">{{ trans('global.login_email') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-envelope"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address" required autofocus>
                        </div>
                        @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="auth-field">
                        <label for="password">{{ trans('global.login_password') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-lock"></i>
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required>
                        </div>
                        @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="auth-options">
                        <label class="auth-check">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>{{ trans('global.remember_me') }}</span>
                        </label>

                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ trans('global.forgot_password') }}</a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary-custom auth-submit-btn">
                        {{ trans('global.login') }}
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                    @if(Route::has('register'))
                        <div class="auth-switch">
                            <span>New here?</span>
                            <a href="{{ route('register') }}">{{ trans('global.register') }}</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
