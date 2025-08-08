<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Expense;
use App\Models\Team;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FinancialReportController extends Controller
{
    public function index(Request $request)
    {
        // Default to current month if no date range provided
        $startDate = $request->start_date ? Carbon::parse($request->start_date) : Carbon::now()->startOfMonth();
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : Carbon::now()->endOfMonth();
        
        // Revenue Data (from paid invoices only)
        $totalRevenue = Invoice::where('status', 'paid')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_amount');
            
        $paidRevenue = $totalRevenue; // Same as total revenue since we only count paid
            
        $pendingRevenue = Invoice::where('status', 'pending')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_amount');
        
        // Expenses Data
        $totalExpenses = Expense::whereBetween('expense_date', [$startDate, $endDate])
            ->sum('amount');
            
        $paidExpenses = Expense::where('status', 'paid')
            ->whereBetween('expense_date', [$startDate, $endDate])
            ->sum('amount');
            
        $pendingExpenses = Expense::where('status', 'pending')
            ->whereBetween('expense_date', [$startDate, $endDate])
            ->sum('amount');
            
        // Team Salaries (monthly cost for all active team members)
        $teamSalaries = Team::where('status', 'active')->sum('salary');
        
        // Calculate number of months in date range to properly calculate team salary costs
        $monthsInRange = $startDate->diffInMonths($endDate) + 1;
        $totalTeamSalaryCost = $teamSalaries * $monthsInRange;
        
        // Total expenses including team salaries
        $totalExpensesWithSalaries = $totalExpenses + $totalTeamSalaryCost;
        $paidExpensesWithSalaries = $paidExpenses + $totalTeamSalaryCost;
        
        // Profit/Loss (including team salaries in expenses)
        $netProfit = $paidRevenue - $paidExpensesWithSalaries;
        
        // Monthly Revenue Trend (last 12 months) - paid invoices only
        $monthlyRevenue = Invoice::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_amount) as total')
            )
            ->where('status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'period' => Carbon::createFromDate($item->year, $item->month, 1)->format('M Y'),
                    'revenue' => $item->total,
                ];
            });
            
        // Monthly Expenses Trend (last 12 months) - including team salaries
        $monthlyExpenses = Expense::select(
                DB::raw('YEAR(expense_date) as year'),
                DB::raw('MONTH(expense_date) as month'),
                DB::raw('SUM(amount) as total')
            )
            ->where('expense_date', '>=', Carbon::now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($item) use ($teamSalaries) {
                return [
                    'period' => Carbon::createFromDate($item->year, $item->month, 1)->format('M Y'),
                    'expenses' => $item->total + $teamSalaries, // Add team salaries to each month
                ];
            });
        
        // Top Categories (Expenses) - including team salaries as a category
        $regularExpenseCategories = Expense::select('category', DB::raw('SUM(amount) as total'))
            ->whereBetween('expense_date', [$startDate, $endDate])
            ->groupBy('category')
            ->orderBy('total', 'desc')
            ->get();
            
        // Add team salaries as a category if there are active team members
        $topExpenseCategories = collect();
        
        if ($totalTeamSalaryCost > 0) {
            $topExpenseCategories->push((object)[
                'category' => 'Team Salaries',
                'total' => $totalTeamSalaryCost
            ]);
        }
        
        // Add regular expense categories
        $topExpenseCategories = $topExpenseCategories->merge($regularExpenseCategories);
        
        // Sort and limit to top 10
        $topExpenseCategories = $topExpenseCategories
            ->sortByDesc('total')
            ->take(10)
            ->values();
        
        // Revenue by Client (from paid invoices only)
        $revenueByClient = Invoice::with('client')
            ->select('client_id', DB::raw('SUM(total_amount) as total'))
            ->where('status', 'paid')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('client_id')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
        
        // Invoice Status Distribution
        $invoiceStatusStats = Invoice::select('status', DB::raw('COUNT(*) as count'), DB::raw('SUM(total_amount) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('status')
            ->get();
            
        // Expense Status Distribution
        $expenseStatusStats = Expense::select('status', DB::raw('COUNT(*) as count'), DB::raw('SUM(amount) as total'))
            ->whereBetween('expense_date', [$startDate, $endDate])
            ->groupBy('status')
            ->get();

        return view('admin.reports.financial', compact(
            'totalRevenue',
            'paidRevenue', 
            'pendingRevenue',
            'totalExpenses',
            'paidExpenses',
            'pendingExpenses',
            'totalExpensesWithSalaries',
            'paidExpensesWithSalaries',
            'teamSalaries',
            'totalTeamSalaryCost',
            'monthsInRange',
            'netProfit',
            'monthlyRevenue',
            'monthlyExpenses',
            'topExpenseCategories',
            'revenueByClient',
            'invoiceStatusStats',
            'expenseStatusStats',
            'startDate',
            'endDate'
        ));
    }

    public function export(Request $request)
    {
        // This could export to PDF/Excel
        // For now, we'll redirect back with a message
        return redirect()->back()
            ->with('info', 'Export functionality will be implemented soon.');
    }
}