<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CampaignEvent;
use App\Models\CampaignFeatured;
use App\Models\CampaignPage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaignPage = CampaignPage::where('status', 1)->latest()->first();
        $featuredCampaign = CampaignFeatured::where('status', 1)->orderBy('sort_order')->first();
        $campaignEvents = CampaignEvent::where('status', 1)->orderBy('sort_order')->get();

        return view('frontend.campaigns', compact(
            'campaignPage',
            'featuredCampaign',
            'campaignEvents'
        ));
    }

    public function show(CampaignEvent $campaignEvent)
    {
        abort_unless($campaignEvent->status, 404);

        $campaignPage = CampaignPage::where('status', 1)->latest()->first();

        return view('frontend.campaign-details', compact(
            'campaignPage',
            'campaignEvent'
        ));
    }
}
