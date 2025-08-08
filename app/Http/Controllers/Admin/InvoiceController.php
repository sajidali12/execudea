<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as DomPDF;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with(['client', 'project'])->latest();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->client_id) {
            $query->where('client_id', $request->client_id);
        }

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('invoice_number', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhereHas('client', function($clientQuery) use ($request) {
                      $clientQuery->where('name', 'like', '%' . $request->search . '%');
                  });
            });
        }

        $invoices = $query->paginate(15);
        $clients = Client::orderBy('name')->get();

        return view('admin.invoices.index', compact('invoices', 'clients'));
    }

    public function create(Request $request)
    {
        $clients = Client::orderBy('name')->get();
        $projects = Project::with('client')->orderBy('name')->get();
        
        $selectedProject = null;
        if ($request->project_id) {
            $selectedProject = Project::find($request->project_id);
        }
        
        return view('admin.invoices.create', compact('clients', 'projects', 'selectedProject'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'nullable|exists:projects,id',
            'amount' => 'required|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,pending,paid,overdue,cancelled',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'description' => 'nullable|string',
            'payment_terms' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Validate that project belongs to selected client
        if ($request->project_id && $request->client_id) {
            $project = Project::find($request->project_id);
            if (!$project || $project->client_id != $request->client_id) {
                return back()->withErrors(['project_id' => 'The selected project must belong to the selected client.']);
            }
        }

        $data = $request->all();
        $data['total_amount'] = $request->amount + ($request->tax_amount ?? 0);

        if ($request->status === 'paid' && !$request->paid_date) {
            $data['paid_date'] = now();
        }

        Invoice::create($data);

        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice created successfully!');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['client', 'project']);
        return view('admin.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $clients = Client::orderBy('name')->get();
        $projects = Project::with('client')->orderBy('name')->get();
        return view('admin.invoices.edit', compact('invoice', 'clients', 'projects'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'project_id' => 'nullable|exists:projects,id',
            'amount' => 'required|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,pending,paid,overdue,cancelled',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'paid_date' => 'nullable|date',
            'description' => 'nullable|string',
            'payment_terms' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Validate that project belongs to selected client
        if ($request->project_id && $request->client_id) {
            $project = Project::find($request->project_id);
            if (!$project || $project->client_id != $request->client_id) {
                return back()->withErrors(['project_id' => 'The selected project must belong to the selected client.']);
            }
        }

        $data = $request->all();
        $data['total_amount'] = $request->amount + ($request->tax_amount ?? 0);

        if ($request->status === 'paid' && !$invoice->paid_date && !$request->paid_date) {
            $data['paid_date'] = now();
        }

        $invoice->update($data);

        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice updated successfully!');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice deleted successfully!');
    }

    public function downloadPdf(Invoice $invoice)
    {
        $invoice->load(['client', 'project']);
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.invoices.pdf', compact('invoice'));
        $pdf->setPaper('A4', 'portrait');
        
        $filename = 'Invoice-' . $invoice->invoice_number . '.pdf';
        
        return $pdf->download($filename);
    }

    public function viewPdf(Invoice $invoice)
    {
        $invoice->load(['client', 'project']);
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.invoices.pdf', compact('invoice'));
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream('Invoice-' . $invoice->invoice_number . '.pdf');
    }
}
