<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\AboutGoal;
use App\Models\AboutObjective;
use App\Models\AboutValue;
use App\Models\AuditLog;
use App\Models\Blog;
use App\Models\BlogPage;
use App\Models\BlogSidebarCategory;
use App\Models\BlogTopic;
use App\Models\CampaignEvent;
use App\Models\CampaignFeatured;
use App\Models\CampaignPage;
use App\Models\ContactPage;
use App\Models\DonatePage;
use App\Models\Donation;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\GalleryAlbum;
use App\Models\GalleryPage;
use App\Models\GalleryPhoto;
use App\Models\GalleryVideo;
use App\Models\OurWork;
use App\Models\OurWorkCategory;
use App\Models\OurWorkDetail;
use App\Models\OurWorkInitiative;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\VolunteerApplication;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        $dashboardMetrics = [
            'users' => User::count(),
            'roles' => Role::count(),
            'permissions' => Permission::count(),
            'auditLogs' => AuditLog::count(),
            'todayUsers' => User::whereDate('created_at', today())->count(),
            'todayLogs' => AuditLog::whereDate('created_at', today())->count(),
        ];

        $contentStats = [
            ['label' => 'About Pages', 'count' => About::count(), 'route' => 'admin.abouts.index', 'icon' => 'fa-info-circle', 'color' => '#4F46E5', 'bg' => '#EEF2FF'],
            ['label' => 'About Values', 'count' => AboutValue::count(), 'route' => 'admin.about-values.index', 'icon' => 'fa-gem', 'color' => '#4F46E5', 'bg' => '#EEF2FF'],
            ['label' => 'About Objectives', 'count' => AboutObjective::count(), 'route' => 'admin.about-objectives.index', 'icon' => 'fa-list-check', 'color' => '#4F46E5', 'bg' => '#EEF2FF'],
            ['label' => 'About Goals', 'count' => AboutGoal::count(), 'route' => 'admin.about-goals.index', 'icon' => 'fa-flag', 'color' => '#4F46E5', 'bg' => '#EEF2FF'],
            ['label' => 'Our Work', 'count' => OurWork::count(), 'route' => 'admin.our-works.index', 'icon' => 'fa-briefcase', 'color' => '#0EA5E9', 'bg' => '#E0F2FE'],
            ['label' => 'Work Categories', 'count' => OurWorkCategory::count(), 'route' => 'admin.our-work-categories.index', 'icon' => 'fa-layer-group', 'color' => '#0EA5E9', 'bg' => '#E0F2FE'],
            ['label' => 'Work Details', 'count' => OurWorkDetail::count(), 'route' => 'admin.our-work-details.index', 'icon' => 'fa-list-check', 'color' => '#0EA5E9', 'bg' => '#E0F2FE'],
            ['label' => 'Work Initiatives', 'count' => OurWorkInitiative::count(), 'route' => 'admin.our-work-initiatives.index', 'icon' => 'fa-plus-circle', 'color' => '#0EA5E9', 'bg' => '#E0F2FE'],
            ['label' => 'Campaign Pages', 'count' => CampaignPage::count(), 'route' => 'admin.campaign-pages.index', 'icon' => 'fa-file-alt', 'color' => '#10B981', 'bg' => '#D1FAE5'],
            ['label' => 'Featured Campaigns', 'count' => CampaignFeatured::count(), 'route' => 'admin.campaign-featureds.index', 'icon' => 'fa-star', 'color' => '#10B981', 'bg' => '#D1FAE5'],
            ['label' => 'Campaign Events', 'count' => CampaignEvent::count(), 'route' => 'admin.campaign-events.index', 'icon' => 'fa-calendar-check', 'color' => '#10B981', 'bg' => '#D1FAE5'],
            ['label' => 'Gallery Pages', 'count' => GalleryPage::count(), 'route' => 'admin.gallery-pages.index', 'icon' => 'fa-file-alt', 'color' => '#F59E0B', 'bg' => '#FEF3C7'],
            ['label' => 'Gallery Photos', 'count' => GalleryPhoto::count(), 'route' => 'admin.gallery-photos.index', 'icon' => 'fa-image', 'color' => '#F59E0B', 'bg' => '#FEF3C7'],
            ['label' => 'Gallery Albums', 'count' => GalleryAlbum::count(), 'route' => 'admin.gallery-albums.index', 'icon' => 'fa-images', 'color' => '#F59E0B', 'bg' => '#FEF3C7'],
            ['label' => 'Gallery Videos', 'count' => GalleryVideo::count(), 'route' => 'admin.gallery-videos.index', 'icon' => 'fa-play-circle', 'color' => '#F59E0B', 'bg' => '#FEF3C7'],
            ['label' => 'Blog Pages', 'count' => BlogPage::count(), 'route' => 'admin.blog-pages.index', 'icon' => 'fa-file-alt', 'color' => '#8B5CF6', 'bg' => '#EDE9FE'],
            ['label' => 'Blogs', 'count' => Blog::count(), 'route' => 'admin.blogs.index', 'icon' => 'fa-newspaper', 'color' => '#8B5CF6', 'bg' => '#EDE9FE'],
            ['label' => 'Blog Topics', 'count' => BlogTopic::count(), 'route' => 'admin.blog-topics.index', 'icon' => 'fa-tags', 'color' => '#8B5CF6', 'bg' => '#EDE9FE'],
            ['label' => 'Blog Categories', 'count' => BlogSidebarCategory::count(), 'route' => 'admin.blog-sidebar-categories.index', 'icon' => 'fa-list', 'color' => '#8B5CF6', 'bg' => '#EDE9FE'],
            ['label' => 'Contact Pages', 'count' => ContactPage::count(), 'route' => 'admin.contact-pages.index', 'icon' => 'fa-address-book', 'color' => '#EC4899', 'bg' => '#FCE7F3'],
            ['label' => 'Donate Pages', 'count' => DonatePage::count(), 'route' => 'admin.donate-pages.index', 'icon' => 'fa-hand-holding-heart', 'color' => '#EF4444', 'bg' => '#FEE2E2'],
            ['label' => 'Website Settings', 'count' => WebsiteSetting::count(), 'route' => 'admin.website-settings.index', 'icon' => 'fa-cog', 'color' => '#6B7280', 'bg' => '#F3F4F6'],
            ['label' => 'FAQs', 'count' => Faq::count(), 'route' => 'admin.faqs.index', 'icon' => 'fa-question-circle', 'color' => '#14B8A6', 'bg' => '#CCFBF1'],
            ['label' => 'Testimonials', 'count' => Testimonial::count(), 'route' => 'admin.testimonials.index', 'icon' => 'fa-comment-dots', 'color' => '#14B8A6', 'bg' => '#CCFBF1'],
            ['label' => 'Enquiries', 'count' => Enquiry::count(), 'route' => 'admin.enquiries.index', 'icon' => 'fa-envelope-open-text', 'color' => '#EC4899', 'bg' => '#FCE7F3'],
            ['label' => 'Donations', 'count' => Donation::count(), 'route' => 'admin.donations.index', 'icon' => 'fa-receipt', 'color' => '#EF4444', 'bg' => '#FEE2E2'],
            ['label' => 'Volunteers', 'count' => VolunteerApplication::count(), 'route' => 'admin.volunteer-applications.index', 'icon' => 'fa-hands-helping', 'color' => '#F97316', 'bg' => '#FFEDD5'],
        ];

        $recentUsers = User::with('roles')
            ->latest()
            ->take(5)
            ->get();

        $recentActivities = AuditLog::latest()
            ->take(6)
            ->get();

        $lastSevenDays = collect(range(6, 0))->map(function ($daysAgo) {
            $date = Carbon::today()->subDays($daysAgo);

            return [
                'label' => $date->format('D'),
                'count' => User::whereDate('created_at', $date)->count(),
            ];
        });

        $roleDistribution = Role::query()
            ->leftJoin('role_user', 'roles.id', '=', 'role_user.role_id')
            ->select('roles.title', DB::raw('COUNT(role_user.user_id) as users_count'))
            ->groupBy('roles.id', 'roles.title')
            ->orderBy('roles.title')
            ->get();

        return view('home', compact(
            'dashboardMetrics',
            'contentStats',
            'recentUsers',
            'recentActivities',
            'lastSevenDays',
            'roleDistribution'
        ));
    }
}
