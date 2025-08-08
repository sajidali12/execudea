<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::with('creator')->latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('expense_date', [$request->start_date, $request->end_date]);
        }

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $expenses = $query->paginate(15);
        
        // Get categories for filter
        $categories = Expense::distinct('category')->pluck('category');

        // Get summary statistics
        $totalExpenses = Expense::sum('amount');
        $pendingExpenses = Expense::pending()->sum('amount');
        $paidExpenses = Expense::paid()->sum('amount');

        return view('admin.expenses.index', compact(
            'expenses', 
            'categories', 
            'totalExpenses', 
            'pendingExpenses', 
            'paidExpenses'
        ));
    }

    public function create()
    {
        // Common expense categories
        $categories = [
            'Salary',
            'Office Supplies',
            'Travel & Transportation',
            'Meals & Entertainment',
            'Software & Licenses',
            'Marketing & Advertising',
            'Utilities',
            'Professional Services',
            'Equipment',
            'Training & Education',
            'Insurance',
            'Rent',
            'Other'
        ];

        return view('admin.expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
            'status' => 'required|in:pending,approved,paid,rejected',
            'notes' => 'nullable|string',
            'receipt_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB max
        ]);

        $data = $request->only(['title', 'description', 'category', 'amount', 'expense_date', 'status', 'notes']);
        $data['created_by'] = auth()->id();

        // Handle file upload
        if ($request->hasFile('receipt_file')) {
            $data['receipt_file'] = $request->file('receipt_file')->store('expenses/receipts', 'public');
        }

        Expense::create($data);

        return redirect()->route('admin.expenses.index')
            ->with('success', 'Expense created successfully!');
    }

    public function show(Expense $expense)
    {
        $expense->load('creator');
        return view('admin.expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        $categories = [
            'Salary',
            'Office Supplies',
            'Travel & Transportation',
            'Meals & Entertainment',
            'Software & Licenses',
            'Marketing & Advertising',
            'Utilities',
            'Professional Services',
            'Equipment',
            'Training & Education',
            'Insurance',
            'Rent',
            'Other'
        ];

        return view('admin.expenses.edit', compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
            'status' => 'required|in:pending,approved,paid,rejected',
            'notes' => 'nullable|string',
            'receipt_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only(['title', 'description', 'category', 'amount', 'expense_date', 'status', 'notes']);

        // Handle file upload
        if ($request->hasFile('receipt_file')) {
            // Delete old file if exists
            if ($expense->receipt_file) {
                Storage::disk('public')->delete($expense->receipt_file);
            }
            $data['receipt_file'] = $request->file('receipt_file')->store('expenses/receipts', 'public');
        }

        $expense->update($data);

        return redirect()->route('admin.expenses.index')
            ->with('success', 'Expense updated successfully!');
    }

    public function destroy(Expense $expense)
    {
        // Delete receipt file if exists
        if ($expense->receipt_file) {
            Storage::disk('public')->delete($expense->receipt_file);
        }

        $expense->delete();

        return redirect()->route('admin.expenses.index')
            ->with('success', 'Expense deleted successfully!');
    }
}