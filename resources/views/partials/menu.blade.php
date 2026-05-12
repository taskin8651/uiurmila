<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

        {{-- ABOUT PAGE MANAGEMENT GROUP --}}
@php
    $aboutActive = request()->is('admin/abouts*')
        || request()->is('admin/about-values*')
        || request()->is('admin/about-objectives*')
        || request()->is('admin/about-goals*');
@endphp

@if(
    Gate::check('about_access') ||
    Gate::check('about_value_access') ||
    Gate::check('about_objective_access') ||
    Gate::check('about_goal_access')
)
    <div x-data="{ open: {{ $aboutActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="About Page"
                class="nav-link nav-group-btn {{ $aboutActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-info-circle nav-icon"></i>
                <span class="nav-label">About Page</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_access')
                <a href="{{ route('admin.abouts.index') }}"
                   class="sub-link {{ request()->is('admin/abouts*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    About Content
                </a>
            @endcan

            @can('about_value_access')
                <a href="{{ route('admin.about-values.index') }}"
                   class="sub-link {{ request()->is('admin/about-values*') ? 'active' : '' }}">
                    <i class="fas fa-gem"></i>
                    Core Values
                </a>
            @endcan

            @can('about_objective_access')
                <a href="{{ route('admin.about-objectives.index') }}"
                   class="sub-link {{ request()->is('admin/about-objectives*') ? 'active' : '' }}">
                    <i class="fas fa-list-check"></i>
                    Objectives
                </a>
            @endcan

            @can('about_goal_access')
                <a href="{{ route('admin.about-goals.index') }}"
                   class="sub-link {{ request()->is('admin/about-goals*') ? 'active' : '' }}">
                    <i class="fas fa-flag"></i>
                    Long Term Goals
                </a>
            @endcan

        </div>
    </div>
@endif

        {{-- OUR WORK MANAGEMENT GROUP --}}
@php
    $ourWorkActive = request()->is('admin/our-works*')
        || request()->is('admin/our-work-categories*')
        || request()->is('admin/our-work-details*')
        || request()->is('admin/our-work-initiatives*');
@endphp

    <div x-data="{ open: {{ $ourWorkActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Our Work"
                class="nav-link nav-group-btn {{ $ourWorkActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-briefcase nav-icon"></i>
                <span class="nav-label">Our Work</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.our-works.index') }}"
               class="sub-link {{ request()->is('admin/our-works*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Page Content
            </a>

            <a href="{{ route('admin.our-work-categories.index') }}"
               class="sub-link {{ request()->is('admin/our-work-categories*') ? 'active' : '' }}">
                <i class="fas fa-layer-group"></i>
                Focus Areas
            </a>

            <a href="{{ route('admin.our-work-details.index') }}"
               class="sub-link {{ request()->is('admin/our-work-details*') ? 'active' : '' }}">
                <i class="fas fa-list-check"></i>
                Program Details
            </a>

            <a href="{{ route('admin.our-work-initiatives.index') }}"
               class="sub-link {{ request()->is('admin/our-work-initiatives*') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i>
                More Initiatives
            </a>

        </div>
    </div>

        {{-- CAMPAIGNS MANAGEMENT GROUP --}}
@php
    $campaignActive = request()->is('admin/campaign-pages*')
        || request()->is('admin/campaign-featureds*')
        || request()->is('admin/campaign-events*');
@endphp

    <div x-data="{ open: {{ $campaignActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Campaigns"
                class="nav-link nav-group-btn {{ $campaignActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-calendar-alt nav-icon"></i>
                <span class="nav-label">Campaigns</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.campaign-pages.index') }}"
               class="sub-link {{ request()->is('admin/campaign-pages*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Page Content
            </a>

            <a href="{{ route('admin.campaign-featureds.index') }}"
               class="sub-link {{ request()->is('admin/campaign-featureds*') ? 'active' : '' }}">
                <i class="fas fa-star"></i>
                Featured Campaign
            </a>

            <a href="{{ route('admin.campaign-events.index') }}"
               class="sub-link {{ request()->is('admin/campaign-events*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i>
                Campaign Events
            </a>

        </div>
    </div>

        {{-- GALLERY MANAGEMENT GROUP --}}
@php
    $galleryActive = request()->is('admin/gallery-pages*')
        || request()->is('admin/gallery-photos*')
        || request()->is('admin/gallery-albums*')
        || request()->is('admin/gallery-videos*');
@endphp

    <div x-data="{ open: {{ $galleryActive ? 'true' : 'false' }} }">
        <button type="button"
                @click="open = !open"
                data-tooltip="Gallery"
                class="nav-link nav-group-btn {{ $galleryActive ? 'active' : '' }}">
            <div class="nav-group-left">
                <i class="fas fa-images nav-icon"></i>
                <span class="nav-label">Gallery</span>
            </div>
            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.gallery-pages.index') }}"
               class="sub-link {{ request()->is('admin/gallery-pages*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Page Content
            </a>

            <a href="{{ route('admin.gallery-photos.index') }}"
               class="sub-link {{ request()->is('admin/gallery-photos*') ? 'active' : '' }}">
                <i class="fas fa-image"></i>
                Photos
            </a>

            <a href="{{ route('admin.gallery-albums.index') }}"
               class="sub-link {{ request()->is('admin/gallery-albums*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                Event Albums
            </a>

            <a href="{{ route('admin.gallery-videos.index') }}"
               class="sub-link {{ request()->is('admin/gallery-videos*') ? 'active' : '' }}">
                <i class="fas fa-play-circle"></i>
                Videos
            </a>
        </div>
    </div>

        {{-- BLOG MANAGEMENT GROUP --}}
@php
    $blogActive = request()->is('admin/blog-pages*')
        || request()->is('admin/blogs*')
        || request()->is('admin/blog-topics*')
        || request()->is('admin/blog-sidebar-categories*');
@endphp

    <div x-data="{ open: {{ $blogActive ? 'true' : 'false' }} }">
        <button type="button"
                @click="open = !open"
                data-tooltip="Blog"
                class="nav-link nav-group-btn {{ $blogActive ? 'active' : '' }}">
            <div class="nav-group-left">
                <i class="fas fa-newspaper nav-icon"></i>
                <span class="nav-label">Blog</span>
            </div>
            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.blog-pages.index') }}"
               class="sub-link {{ request()->is('admin/blog-pages*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Page Content
            </a>

            <a href="{{ route('admin.blogs.index') }}"
               class="sub-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                Articles
            </a>

            <a href="{{ route('admin.blog-topics.index') }}"
               class="sub-link {{ request()->is('admin/blog-topics*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i>
                Topics
            </a>

            <a href="{{ route('admin.blog-sidebar-categories.index') }}"
               class="sub-link {{ request()->is('admin/blog-sidebar-categories*') ? 'active' : '' }}">
                <i class="fas fa-list"></i>
                Sidebar Categories
            </a>
        </div>
    </div>

        {{-- CONTACT & SETTINGS GROUP --}}
@php
    $contactActive = request()->is('admin/website-settings*')
        || request()->is('admin/contact-pages*')
        || request()->is('admin/enquiries*')
        || request()->is('admin/donate-pages*')
        || request()->is('admin/donations*')
        || request()->is('admin/faqs*')
        || request()->is('admin/testimonials*')
        || request()->is('admin/volunteer-applications*');
@endphp

    <div x-data="{ open: {{ $contactActive ? 'true' : 'false' }} }">
        <button type="button"
                @click="open = !open"
                data-tooltip="Contact"
                class="nav-link nav-group-btn {{ $contactActive ? 'active' : '' }}">
            <div class="nav-group-left">
                <i class="fas fa-headset nav-icon"></i>
                <span class="nav-label">Contact & Settings</span>
            </div>
            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.website-settings.index') }}"
               class="sub-link {{ request()->is('admin/website-settings*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                Website Settings
            </a>

            <a href="{{ route('admin.contact-pages.index') }}"
               class="sub-link {{ request()->is('admin/contact-pages*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                Contact Page
            </a>

            <a href="{{ route('admin.enquiries.index') }}"
               class="sub-link {{ request()->is('admin/enquiries*') ? 'active' : '' }}">
                <i class="fas fa-envelope-open-text"></i>
                Enquiries
            </a>

            <a href="{{ route('admin.donate-pages.index') }}"
               class="sub-link {{ request()->is('admin/donate-pages*') ? 'active' : '' }}">
                <i class="fas fa-hand-holding-heart"></i>
                Donate Page
            </a>

            <a href="{{ route('admin.donations.index') }}"
               class="sub-link {{ request()->is('admin/donations*') ? 'active' : '' }}">
                <i class="fas fa-receipt"></i>
                Donations
            </a>

            <a href="{{ route('admin.faqs.index') }}"
               class="sub-link {{ request()->is('admin/faqs*') ? 'active' : '' }}">
                <i class="fas fa-question-circle"></i>
                FAQs
            </a>

            <a href="{{ route('admin.testimonials.index') }}"
               class="sub-link {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                <i class="fas fa-comment-dots"></i>
                Testimonials
            </a>

            <a href="{{ route('admin.volunteer-applications.index') }}"
               class="sub-link {{ request()->is('admin/volunteer-applications*') ? 'active' : '' }}">
                <i class="fas fa-hands-helping"></i>
                Volunteers
            </a>
        </div>
    </div>

        

        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>
