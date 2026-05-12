<?php

namespace App\Http\Controllers\Admin;

use App\Models\CampaignEvent;
use App\Models\CampaignFeatured;
use App\Models\CampaignPage;
use App\Models\ContactPage;
use App\Models\DonatePage;
use App\Models\Donation;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\HomeHero;
use App\Models\OurWork;
use App\Models\OurWorkCategory;
use App\Models\OurWorkDetail;
use App\Models\OurWorkInitiative;
use App\Models\Testimonial;
use App\Models\VolunteerApplication;
use App\Models\WebsiteSetting;

class HomeController
{
    public function index()
    {
        $dashboardMetrics = [
            'donations' => Donation::count(),
            'todayDonations' => Donation::whereDate('created_at', today())->count(),
            'donationAmount' => Donation::sum('amount'),
            'enquiries' => Enquiry::count(),
            'newEnquiries' => Enquiry::where('status', 'new')->count(),
            'campaigns' => CampaignEvent::count(),
            'activeCampaigns' => CampaignEvent::where('status', true)->count(),
            'ourWorks' => OurWork::count(),
            'workCategories' => OurWorkCategory::count(),
            'workInitiatives' => OurWorkInitiative::count(),
        ];

        $contentStats = [
            ['label' => 'Home Hero', 'count' => HomeHero::count(), 'route' => 'admin.home-hero.index', 'icon' => 'fa-house', 'color' => '#7C3AED', 'bg' => '#F3E8FF'],
            ['label' => 'Donations', 'count' => Donation::count(), 'route' => 'admin.donations.index', 'icon' => 'fa-receipt', 'color' => '#B91C1C', 'bg' => '#FEE2E2'],
            ['label' => 'Donate Page', 'count' => DonatePage::count(), 'route' => 'admin.donate-pages.index', 'icon' => 'fa-hand-holding-heart', 'color' => '#DC2626', 'bg' => '#FEF2F2'],
            ['label' => 'Enquiries', 'count' => Enquiry::count(), 'route' => 'admin.enquiries.index', 'icon' => 'fa-envelope-open-text', 'color' => '#BE185D', 'bg' => '#FCE7F3'],
            ['label' => 'Contact Page', 'count' => ContactPage::count(), 'route' => 'admin.contact-pages.index', 'icon' => 'fa-address-book', 'color' => '#DB2777', 'bg' => '#FDF2F8'],
            ['label' => 'Campaign Pages', 'count' => CampaignPage::count(), 'route' => 'admin.campaign-pages.index', 'icon' => 'fa-file-alt', 'color' => '#047857', 'bg' => '#D1FAE5'],
            ['label' => 'Featured Campaigns', 'count' => CampaignFeatured::count(), 'route' => 'admin.campaign-featureds.index', 'icon' => 'fa-star', 'color' => '#059669', 'bg' => '#ECFDF5'],
            ['label' => 'Campaign Events', 'count' => CampaignEvent::count(), 'route' => 'admin.campaign-events.index', 'icon' => 'fa-calendar-check', 'color' => '#0F766E', 'bg' => '#CCFBF1'],
            ['label' => 'Our Work', 'count' => OurWork::count(), 'route' => 'admin.our-works.index', 'icon' => 'fa-briefcase', 'color' => '#0369A1', 'bg' => '#E0F2FE'],
            ['label' => 'Work Categories', 'count' => OurWorkCategory::count(), 'route' => 'admin.our-work-categories.index', 'icon' => 'fa-layer-group', 'color' => '#0284C7', 'bg' => '#F0F9FF'],
            ['label' => 'Work Details', 'count' => OurWorkDetail::count(), 'route' => 'admin.our-work-details.index', 'icon' => 'fa-list-check', 'color' => '#2563EB', 'bg' => '#DBEAFE'],
            ['label' => 'Work Initiatives', 'count' => OurWorkInitiative::count(), 'route' => 'admin.our-work-initiatives.index', 'icon' => 'fa-plus-circle', 'color' => '#1D4ED8', 'bg' => '#EFF6FF'],
            ['label' => 'Volunteers', 'count' => VolunteerApplication::count(), 'route' => 'admin.volunteer-applications.index', 'icon' => 'fa-hands-helping', 'color' => '#C2410C', 'bg' => '#FFEDD5'],
            ['label' => 'FAQs', 'count' => Faq::count(), 'route' => 'admin.faqs.index', 'icon' => 'fa-question-circle', 'color' => '#0F766E', 'bg' => '#F0FDFA'],
            ['label' => 'Testimonials', 'count' => Testimonial::count(), 'route' => 'admin.testimonials.index', 'icon' => 'fa-comment-dots', 'color' => '#7C2D12', 'bg' => '#FFF7ED'],
            ['label' => 'Website Settings', 'count' => WebsiteSetting::count(), 'route' => 'admin.website-settings.index', 'icon' => 'fa-cog', 'color' => '#475569', 'bg' => '#F1F5F9'],
        ];

        $recentDonations = Donation::latest()->take(5)->get();
        $recentEnquiries = Enquiry::latest()->take(5)->get();
        $recentCampaigns = CampaignEvent::latest()->take(5)->get();
        $recentOurWorks = OurWork::latest()->take(5)->get();

        return view('home', compact(
            'dashboardMetrics',
            'contentStats',
            'recentDonations',
            'recentEnquiries',
            'recentCampaigns',
            'recentOurWorks'
        ));
    }
}
