<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Invoice;
use App\Models\Expense;
use App\Models\Message;
use App\Models\Course;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\ProfileUpdateRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        // Get current month for calculations
        $currentMonth = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        
        // Calculate real statistics
        $stats = [
            // General counts
            'posts' => Post::count(),
            'clients' => Client::count(),
            'active_projects' => Project::where('status', 'active')->count(),
            'total_users' => User::count(),
            'messages' => Message::count(),
            'courses' => Course::count(),
            
            // Financial data (monthly)
            'monthly_revenue' => Invoice::where('status', 'paid')
                ->whereBetween('created_at', [$currentMonth, $currentMonthEnd])
                ->sum('total_amount'),
            'monthly_expenses' => Expense::where('status', 'paid')
                ->whereBetween('expense_date', [$currentMonth, $currentMonthEnd])
                ->sum('amount'),
            'team_salaries' => Team::where('status', 'active')->sum('salary'),
            'pending_invoices' => Invoice::where('status', 'pending')->count(),
            'paid_invoices' => Invoice::where('status', 'paid')->count(),
            
            // Recent activity
            'recent_messages' => Message::whereDate('created_at', '>=', Carbon::now()->subDays(7))->count(),
            'recent_expenses' => Expense::whereDate('created_at', '>=', Carbon::now()->subDays(7))->count(),
            'recent_invoices' => Invoice::whereDate('created_at', '>=', Carbon::now()->subDays(7))->count(),
        ];
        
        // Calculate total monthly expenses (including team salaries)
        $stats['total_monthly_expenses'] = $stats['monthly_expenses'] + $stats['team_salaries'];
        
        // Calculate monthly profit (revenue - all expenses including salaries)
        $stats['monthly_profit'] = $stats['monthly_revenue'] - $stats['total_monthly_expenses'];
        
        // Get recent activity data
        $recentInvoices = Invoice::with('client')
            ->latest()
            ->take(5)
            ->get();
            
        $recentExpenses = Expense::with('creator')
            ->latest()
            ->take(5)
            ->get();
            
        $recentMessages = Message::latest()
            ->take(5)
            ->get();
            
        $recentProjects = Project::with('client')
            ->latest()
            ->take(5)
            ->get();
            
        // Monthly trends (last 6 months)
        $monthlyData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthStart = $month->copy()->startOfMonth();
            $monthEnd = $month->copy()->endOfMonth();
            
            $monthlyExpenses = Expense::where('status', 'paid')
                ->whereBetween('expense_date', [$monthStart, $monthEnd])
                ->sum('amount');
            
            // Add team salaries to monthly expenses for trend calculation
            $totalExpenses = $monthlyExpenses + $stats['team_salaries'];
            
            $monthlyData[] = [
                'month' => $month->format('M'),
                'revenue' => Invoice::where('status', 'paid')
                    ->whereBetween('created_at', [$monthStart, $monthEnd])
                    ->sum('total_amount'),
                'expenses' => $totalExpenses,
            ];
        }

        return view('admin.dashboard', compact(
            'user', 
            'stats', 
            'recentInvoices',
            'recentExpenses', 
            'recentMessages',
            'recentProjects',
            'monthlyData'
        ));
    }

    public function edit(Request $request)
    {
        return view('admin.settings', [
            'user' => $request->user(),
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
        ]);
    
        $user = $request->user();
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }
    
        if (Hash::check($validated['password'], $user->password)) {
            return back()->withErrors(['password' => 'The new password cannot be the same as the current password.']);
        }
    
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);
    
        return redirect()->route('admin-settings')->with('success', 'Password updated successfully!');
    }
    

   
}
