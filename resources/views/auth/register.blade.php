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
                    <i class="bi bi-person-plus-fill"></i>
                    Join the Mission
                </span>

                <h1>Create Your Account</h1>
                <p>
                    Register with URMILA Development Foundation to access your account and stay connected with our social initiatives.
                </p>

                <div class="auth-feature-list">
                    <div><i class="bi bi-check-circle-fill"></i><span>Simple account setup</span></div>
                    <div><i class="bi bi-check-circle-fill"></i><span>Secure member profile</span></div>
                    <div><i class="bi bi-check-circle-fill"></i><span>Access foundation updates</span></div>
                </div>
            </div>

            <div class="auth-card">
                <div class="auth-brand">
                    <img src="{{ $siteLogo }}" alt="{{ $siteName }}">
                    <div>
                        <h2>{{ $siteName }}</h2>
                        <span>{{ trans('global.register') }}</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf

                    <div class="auth-field">
                        <label for="name">{{ trans('global.user_name') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-person"></i>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name" required autofocus>
                        </div>
                        @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="auth-field">
                        <label for="email">{{ trans('global.login_email') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-envelope"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address" required>
                        </div>
                        @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="auth-field">
                        <label for="password">{{ trans('global.login_password') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-lock"></i>
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Create password" required>
                        </div>
                        @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="auth-field">
                        <label for="password_confirmation">{{ trans('global.login_password_confirmation') }}</label>
                        <div class="auth-input-wrap">
                            <i class="bi bi-shield-check"></i>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="form-control" placeholder="Confirm password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary-custom auth-submit-btn">
                        {{ trans('global.register') }}
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                    <div class="auth-switch">
                        <span>Already have an account?</span>
                        <a href="{{ route('login') }}">{{ trans('global.login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
