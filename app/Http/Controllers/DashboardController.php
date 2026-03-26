<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\FollowUp;
use App\Models\Quotation;
use Illuminate\View\View;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): View
    {
        $today = Carbon::today();

        $stats = [
            'total_companies' => Company::count(),
            'active_prospects' => Company::whereNotIn('status', ['won', 'lost', 'archived'])->count(),
            'won_companies' => Company::where('status', 'won')->count(),
            'pending_follow_ups' => FollowUp::where('status', 'pending')->count(),
            'follow_ups_today' => FollowUp::where('status', 'pending')->whereDate('due_date', $today)->count(),
            'overdue_follow_ups' => FollowUp::where('status', 'pending')->whereDate('due_date', '<', $today)->count(),
            'proposal_sent' => Quotation::where('status', 'sent')->count(),
            'negotiating' => Quotation::where('status', 'negotiating')->count(),
        ];

        $todayFollowUps = FollowUp::with(['company', 'contact'])
            ->where('status', 'pending')
            ->whereDate('due_date', $today)
            ->orderBy('due_date')
            ->get();

        $overdueFollowUps = FollowUp::with(['company', 'contact'])
            ->where('status', 'pending')
            ->whereDate('due_date', '<', $today)
            ->orderBy('due_date')
            ->get();

        $recentCompanies = Company::latest()->take(10)->get();

        return view('dashboard.index', compact(
            'stats',
            'todayFollowUps',
            'overdueFollowUps',
            'recentCompanies'
        ));
    }
}