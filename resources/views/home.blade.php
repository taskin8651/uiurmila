@extends('layouts.admin')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    * { font-family: 'Plus Jakarta Sans', sans-serif; }
    .dashboard-shell { display: flex; flex-direction: column; gap: 20px; }
    .dashboard-head { display: flex; align-items: center; justify-content: space-between; gap: 16px; }
    .dashboard-title { font-size: 24px; line-height: 1.2; font-weight: 700; color: #111827; margin: 0; }
    .dashboard-subtitle { font-size: 13px; color: #64748B; margin: 5px 0 0; }
    .date-pill { display: inline-flex; align-items: center; gap: 8px; background: #fff; border: 1px solid #E5E7EB; border-radius: 8px; padding: 9px 12px; font-size: 12px; color: #64748B; }
    .hero-panel { background: linear-gradient(135deg, #0F766E 0%, #B91C1C 100%); border-radius: 12px; padding: 24px; color: #fff; display: flex; justify-content: space-between; gap: 20px; overflow: hidden; position: relative; }
    .hero-panel:after { content: ''; position: absolute; width: 240px; height: 240px; border-radius: 999px; right: -70px; top: -90px; background: rgba(255,255,255,.12); }
    .hero-panel > * { position: relative; z-index: 1; }
    .hero-title { font-size: 21px; font-weight: 700; margin: 0 0 7px; }
    .hero-text { max-width: 650px; color: rgba(255,255,255,.86); font-size: 13px; margin: 0; }
    .hero-total { min-width: 190px; background: rgba(255,255,255,.14); border: 1px solid rgba(255,255,255,.22); border-radius: 10px; padding: 14px 16px; }
    .hero-total span { display: block; font-size: 12px; color: rgba(255,255,255,.76); }
    .hero-total strong { display: block; font-size: 25px; line-height: 1.1; margin-top: 4px; }
    .stats-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }
    .stat-card, .panel-card { background: #fff; border: 1px solid #E5E7EB; border-radius: 10px; box-shadow: 0 12px 30px rgba(15,23,42,.04); }
    .stat-card { padding: 18px; display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
    .stat-label { color: #64748B; font-size: 12px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase; margin: 0 0 8px; }
    .stat-value { color: #111827; font-size: 29px; line-height: 1; font-weight: 700; margin: 0; }
    .stat-note { display: inline-flex; margin-top: 10px; border-radius: 999px; padding: 4px 9px; font-size: 11px; font-weight: 700; }
    .stat-icon { width: 46px; height: 46px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
    .module-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); gap: 10px; }
    .module-link { display: flex; align-items: center; gap: 11px; padding: 13px 14px; border-radius: 10px; text-decoration: none; transition: transform .15s, box-shadow .15s; }
    .module-link:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(15,23,42,.08); }
    .module-icon { width: 36px; height: 36px; border-radius: 9px; background: #fff; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .module-label { display: block; color: #475569; font-size: 12px; font-weight: 700; }
    .module-count { display: block; color: #111827; font-size: 20px; line-height: 1.15; font-weight: 700; }
    .panel-card { padding: 18px; }
    .panel-title-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 14px; }
    .panel-title { margin: 0; color: #111827; font-size: 15px; font-weight: 700; }
    .panel-link { color: #0F766E; font-size: 12px; font-weight: 700; text-decoration: none; }
    .list-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
    .mini-list { display: flex; flex-direction: column; gap: 0; }
    .list-item { display: flex; justify-content: space-between; gap: 12px; padding: 11px 0; border-bottom: 1px solid #F1F5F9; }
    .list-item:last-child { border-bottom: 0; }
    .item-title { margin: 0; color: #1F2937; font-size: 13px; font-weight: 700; }
    .item-sub { margin: 3px 0 0; color: #94A3B8; font-size: 12px; line-height: 1.35; }
    .status-pill { align-self: flex-start; border-radius: 999px; padding: 4px 9px; background: #F1F5F9; color: #475569; font-size: 11px; font-weight: 700; white-space: nowrap; text-transform: capitalize; }
    .empty-state { margin: 0; color: #94A3B8; font-size: 13px; padding: 8px 0; }
    @media(max-width: 1024px) {
        .stats-grid, .list-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .hero-panel { flex-direction: column; }
        .hero-total { min-width: 0; }
    }
    @media(max-width: 640px) {
        .dashboard-head, .stat-card { flex-direction: column; align-items: flex-start; }
        .stats-grid, .list-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="dashboard-shell">
    <div class="dashboard-head">
        <div>
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">Donations, enquiries, campaigns and our work at a glance.</p>
        </div>
        <span class="date-pill">
            <i class="fas fa-calendar-alt"></i>
            {{ now()->format('D, d M Y') }}
        </span>
    </div>

    <div class="hero-panel">
        <div>
            <p class="hero-title">Welcome back, {{ auth()->user()->name }}</p>
            <p class="hero-text">Track important NGO modules from one place. Use the quick module cards to open donation records, enquiry messages, campaign content and our work sections.</p>
        </div>
        <div class="hero-total">
            <span>Total Donation Amount</span>
            <strong>Rs. {{ number_format($dashboardMetrics['donationAmount'], 2) }}</strong>
        </div>
    </div>

    <div class="stats-grid">
        <a href="{{ route('admin.donations.index') }}" class="stat-card" style="text-decoration:none;">
            <div>
                <p class="stat-label">Donations</p>
                <p class="stat-value">{{ number_format($dashboardMetrics['donations']) }}</p>
                <span class="stat-note" style="background:#FEE2E2; color:#B91C1C;">{{ number_format($dashboardMetrics['todayDonations']) }} today</span>
            </div>
            <div class="stat-icon" style="background:#FEE2E2; color:#B91C1C;"><i class="fas fa-receipt"></i></div>
        </a>

        <a href="{{ route('admin.enquiries.index') }}" class="stat-card" style="text-decoration:none;">
            <div>
                <p class="stat-label">Enquiries</p>
                <p class="stat-value">{{ number_format($dashboardMetrics['enquiries']) }}</p>
                <span class="stat-note" style="background:#FCE7F3; color:#BE185D;">{{ number_format($dashboardMetrics['newEnquiries']) }} new</span>
            </div>
            <div class="stat-icon" style="background:#FCE7F3; color:#BE185D;"><i class="fas fa-envelope-open-text"></i></div>
        </a>

        <a href="{{ route('admin.campaign-events.index') }}" class="stat-card" style="text-decoration:none;">
            <div>
                <p class="stat-label">Campaigns</p>
                <p class="stat-value">{{ number_format($dashboardMetrics['campaigns']) }}</p>
                <span class="stat-note" style="background:#D1FAE5; color:#047857;">{{ number_format($dashboardMetrics['activeCampaigns']) }} active</span>
            </div>
            <div class="stat-icon" style="background:#D1FAE5; color:#047857;"><i class="fas fa-bullhorn"></i></div>
        </a>

        <a href="{{ route('admin.our-works.index') }}" class="stat-card" style="text-decoration:none;">
            <div>
                <p class="stat-label">Our Work</p>
                <p class="stat-value">{{ number_format($dashboardMetrics['ourWorks']) }}</p>
                <span class="stat-note" style="background:#E0F2FE; color:#0369A1;">{{ number_format($dashboardMetrics['workInitiatives']) }} initiatives</span>
            </div>
            <div class="stat-icon" style="background:#E0F2FE; color:#0369A1;"><i class="fas fa-briefcase"></i></div>
        </a>
    </div>

    <div class="panel-card">
        <div class="panel-title-row">
            <p class="panel-title">Main Modules</p>
        </div>

        <div class="module-grid">
            @foreach($contentStats as $item)
                <a href="{{ route($item['route']) }}" class="module-link" style="background:{{ $item['bg'] }}; color:{{ $item['color'] }};">
                    <span class="module-icon">
                        <i class="fas {{ $item['icon'] }}"></i>
                    </span>
                    <span>
                        <span class="module-label">{{ $item['label'] }}</span>
                        <span class="module-count">{{ number_format($item['count']) }}</span>
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="list-grid">
        <div class="panel-card">
            <div class="panel-title-row">
                <p class="panel-title">Recent Donations</p>
                <a href="{{ route('admin.donations.index') }}" class="panel-link">View All</a>
            </div>
            <div class="mini-list">
                @forelse($recentDonations as $donation)
                    <div class="list-item">
                        <div>
                            <p class="item-title">{{ $donation->full_name }}</p>
                            <p class="item-sub">{{ $donation->email ?: $donation->mobile_number ?: 'No contact' }}</p>
                        </div>
                        <span class="status-pill">Rs. {{ number_format($donation->amount ?? 0, 2) }}</span>
                    </div>
                @empty
                    <p class="empty-state">No donations found.</p>
                @endforelse
            </div>
        </div>

        <div class="panel-card">
            <div class="panel-title-row">
                <p class="panel-title">Recent Enquiries</p>
                <a href="{{ route('admin.enquiries.index') }}" class="panel-link">View All</a>
            </div>
            <div class="mini-list">
                @forelse($recentEnquiries as $enquiry)
                    <div class="list-item">
                        <div>
                            <p class="item-title">{{ $enquiry->name }}</p>
                            <p class="item-sub">{{ $enquiry->subject ?: $enquiry->email ?: 'No subject' }}</p>
                        </div>
                        <span class="status-pill">{{ $enquiry->status }}</span>
                    </div>
                @empty
                    <p class="empty-state">No enquiries found.</p>
                @endforelse
            </div>
        </div>

        <div class="panel-card">
            <div class="panel-title-row">
                <p class="panel-title">Recent Campaigns</p>
                <a href="{{ route('admin.campaign-events.index') }}" class="panel-link">View All</a>
            </div>
            <div class="mini-list">
                @forelse($recentCampaigns as $campaign)
                    <div class="list-item">
                        <div>
                            <p class="item-title">{{ $campaign->title }}</p>
                            <p class="item-sub">{{ $campaign->category ?: $campaign->location ?: 'Campaign event' }}</p>
                        </div>
                        <span class="status-pill">{{ $campaign->status ? 'Active' : 'Inactive' }}</span>
                    </div>
                @empty
                    <p class="empty-state">No campaigns found.</p>
                @endforelse
            </div>
        </div>

        <div class="panel-card">
            <div class="panel-title-row">
                <p class="panel-title">Our Work Updates</p>
                <a href="{{ route('admin.our-works.index') }}" class="panel-link">View All</a>
            </div>
            <div class="mini-list">
                @forelse($recentOurWorks as $work)
                    <div class="list-item">
                        <div>
                            <p class="item-title">{{ $work->hero_title ?: 'Our Work Page' }}</p>
                            <p class="item-sub">{{ $work->categories_title ?: $work->details_title ?: 'Work content' }}</p>
                        </div>
                        <span class="status-pill">{{ $work->status ? 'Active' : 'Inactive' }}</span>
                    </div>
                @empty
                    <p class="empty-state">No our work records found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
