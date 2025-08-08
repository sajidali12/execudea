<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333333;
            background: #ffffff;
        }
        
        .container {
            max-width: 750px;
            margin: 0 auto;
            padding: 15px 40px;
        }
        
        /* Header */
        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
            border-bottom: 3px solid #4db8b3;
            padding-bottom: 15px;
        }
        
        .header-left {
            display: table-cell;
            width: 60%;
            vertical-align: top;
        }
        
        .header-right {
            display: table-cell;
            width: 40%;
            text-align: right;
            vertical-align: top;
        }
        
        .company-logo {
            max-width: 180px;
            max-height: 60px;
            margin-bottom: 10px;
        }
        
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #4db8b3;
            margin-bottom: 5px;
        }
        
        .company-tagline {
            font-size: 12px;
            color: #666666;
            margin-bottom: 10px;
        }
        
        .invoice-title {
            font-size: 28px;
            font-weight: bold;
            color: #4db8b3;
            margin-bottom: 10px;
        }
        
        .invoice-number {
            font-size: 16px;
            color: #333333;
            margin-bottom: 5px;
        }
        
        .invoice-date {
            font-size: 14px;
            color: #666666;
        }
        
        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 10px;
        }
        
        .status-paid {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
            border: 1px solid #f59e0b;
        }
        
        .status-overdue {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }
        
        .status-draft {
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #6b7280;
        }
        
        /* Billing Information */
        .billing-section {
            display: table;
            width: 100%;
            margin: 20px 0;
        }
        
        .billing-from, .billing-to {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding: 0 15px;
        }
        
        .billing-from {
            border-right: 1px solid #e5e7eb;
        }
        
        .billing-title {
            font-size: 14px;
            font-weight: bold;
            color: #4db8b3;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-bottom: 2px solid #4db8b3;
            padding-bottom: 5px;
        }
        
        .company-info, .client-info {
            font-size: 13px;
            line-height: 1.5;
        }
        
        .company-info p, .client-info p {
            margin-bottom: 3px;
        }
        
        .company-name-billing {
            font-weight: bold;
            font-size: 15px;
            color: #111827;
        }
        
        /* Invoice Details */
        .invoice-details {
            margin: 20px 0;
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #4db8b3;
        }
        
        .details-row {
            display: table;
            width: 100%;
            margin-bottom: 8px;
        }
        
        .details-label {
            display: table-cell;
            width: 30%;
            font-weight: bold;
            color: #374151;
        }
        
        .details-value {
            display: table-cell;
            width: 70%;
            color: #111827;
        }
        
        /* Content Section */
        .content-section {
            display: table;
            width: 100%;
            margin: 15px 0;
        }
        
        .description-left {
            display: table-cell;
            width: 60%;
            vertical-align: top;
            padding-right: 20px;
        }
        
        /* Amount Summary */
        .amount-summary {
            display: table-cell;
            width: 40%;
            vertical-align: top;
            background-color: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .summary-header {
            background-color: #4db8b3;
            color: white;
            padding: 15px;
            font-weight: bold;
            text-align: center;
            font-size: 16px;
        }
        
        .summary-body {
            padding: 20px;
        }
        
        .summary-row {
            display: table;
            width: 100%;
            margin-bottom: 8px;
            padding-bottom: 8px;
        }
        
        .summary-row.total {
            border-top: 2px solid #4db8b3;
            padding-top: 12px;
            margin-top: 12px;
            font-weight: bold;
            font-size: 16px;
            color: #4db8b3;
        }
        
        .summary-label {
            display: table-cell;
            width: 60%;
        }
        
        .summary-amount {
            display: table-cell;
            width: 40%;
            text-align: right;
        }
        
        /* Description Section */
        .description-section {
            clear: both;
            margin: 10px 0;
            padding: 12px;
            background-color: #f8fafc;
            border-radius: 8px;
            border-left: 4px solid #4db8b3;
        }
        
        .description-title {
            font-size: 16px;
            font-weight: bold;
            color: #4db8b3;
            margin-bottom: 10px;
        }
        
        .description-content {
            color: #374151;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        
        /* Footer */
        .footer {
            margin-top: 15px;
            padding-top: 8px;
            border-top: 2px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 10px;
        }
        
        .footer-row {
            margin-bottom: 4px;
        }
        
        .contact-info {
            margin-top: 5px;
        }
        
        /* Payment Terms */
        .payment-terms {
            margin: 15px 0;
            padding: 10px;
            background-color: #fffbeb;
            border-left: 4px solid #f59e0b;
            border-radius: 4px;
        }
        
        .payment-terms-title {
            font-weight: bold;
            color: #92400e;
            margin-bottom: 5px;
            font-size: 12px;
        }
        
        .payment-terms-content {
            color: #78350f;
            font-size: 11px;
        }
        
        /* Notes */
        .notes-section {
            margin: 10px 0;
            padding: 10px;
            background-color: #f0f9ff;
            border-left: 4px solid #4db8b3;
            border-radius: 4px;
        }
        
        .notes-title {
            font-weight: bold;
            color: #4db8b3;
            margin-bottom: 5px;
            font-size: 12px;
        }
        
        .notes-content {
            color: #0f172a;
            font-size: 11px;
            white-space: pre-wrap;
        }
        
        /* Page break control */
        .no-break {
            page-break-inside: avoid;
        }
        
        /* Watermark for unpaid invoices */
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 80px;
            color: rgba(239, 68, 68, 0.1);
            font-weight: bold;
            z-index: -1;
            pointer-events: none;
        }
        
        @media print {
            body {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
                margin: 0;
            }
            
            .container {
                max-width: none;
                margin: 0;
                padding: 20px 40px;
            }
            
            @page {
                margin: 0.5in;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Watermark for unpaid invoices -->
        @if($invoice->status !== 'paid')
        <div class="watermark">{{ strtoupper($invoice->status) }}</div>
        @endif
        
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <img src="{{ public_path('img/execudea.png') }}" alt="Execudea Logo" class="company-logo">
                <div class="company-name">Execudea Private Limited</div>
                <div class="company-tagline">Best Website Development Company In Pakistan</div>
            </div>
            <div class="header-right">
                <div class="invoice-title">INVOICE</div>
                <div class="invoice-number">{{ $invoice->invoice_number }}</div>
                <div class="invoice-date">{{ $invoice->issue_date->format('F d, Y') }}</div>
            </div>
        </div>
        
        <!-- Billing Information -->
        <div class="billing-section">
            <div class="billing-from">
                <div class="billing-title">From</div>
                <div class="company-info">
                    <p class="company-name-billing">Execudea Private Limited</p>
                    <p>Best Website Development Company</p>
                    <p>Office #02, 2nd Floor, Building 140</p>
                    <p>I&T Center G9/1 Islamabad, Pakistan</p>
                    <p><strong>Email:</strong> info@execudea.com</p>
                    <p><strong>Phone:</strong> +92 336 5707907</p>
                </div>
            </div>
            <div class="billing-to">
                <div class="billing-title">Bill To</div>
                <div class="client-info">
                    <p><strong>{{ $invoice->client->name }}</strong></p>
                    @if($invoice->client->company)
                    <p>{{ $invoice->client->company }}</p>
                    @endif
                    <p>{{ $invoice->client->email }}</p>
                    @if($invoice->client->phone)
                    <p>{{ $invoice->client->phone }}</p>
                    @endif
                    @if($invoice->client->address)
                    <p>{{ $invoice->client->address }}</p>
                    @endif
                    @if($invoice->client->city)
                    <p>{{ $invoice->client->city }}@if($invoice->client->country), {{ $invoice->client->country }}@endif</p>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Invoice Details -->
        <div class="invoice-details">
            <div class="details-row">
                <div class="details-label">Invoice Number:</div>
                <div class="details-value">{{ $invoice->invoice_number }}</div>
            </div>
            <div class="details-row">
                <div class="details-label">Issue Date:</div>
                <div class="details-value">{{ $invoice->issue_date->format('F d, Y') }}</div>
            </div>
            @if($invoice->paid_date)
            <div class="details-row">
                <div class="details-label">Paid Date:</div>
                <div class="details-value">{{ $invoice->paid_date->format('F d, Y') }}</div>
            </div>
            @endif
            @if($invoice->project)
            <div class="details-row">
                <div class="details-label">Project:</div>
                <div class="details-value">{{ $invoice->project->name }} ({{ $invoice->project->type }})</div>
            </div>
            @endif
        </div>
        
        <!-- Content Section with Description and Amount Summary -->
        <div class="content-section">
            <div class="description-left">
                @if($invoice->description)
                <div class="description-section">
                    <div class="description-title">Description</div>
                    <div class="description-content">{{ $invoice->description }}</div>
                </div>
                @endif
                
                @if($invoice->notes)
                <div class="notes-section" style="margin-top: 15px;">
                    <div class="notes-title">Additional Notes</div>
                    <div class="notes-content">{{ $invoice->notes }}</div>
                </div>
                @endif
            </div>
            
            <div class="amount-summary">
                <div class="summary-header">
                    Invoice Summary
                </div>
                <div class="summary-body">
                    <div class="summary-row">
                        <div class="summary-label">Subtotal:</div>
                        <div class="summary-amount">PKR {{ number_format($invoice->amount, 2) }}</div>
                    </div>
                    @if($invoice->tax_amount > 0)
                    <div class="summary-row">
                        <div class="summary-label">Tax:</div>
                        <div class="summary-amount">PKR {{ number_format($invoice->tax_amount, 2) }}</div>
                    </div>
                    @endif
                    <div class="summary-row total">
                        <div class="summary-label">Total Amount:</div>
                        <div class="summary-amount">PKR {{ number_format($invoice->total_amount, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-row">
                <strong>Thank you for your business!</strong>
            </div>
            <div class="contact-info">
                <div class="footer-row">
                    <strong>Execudea Private Limited</strong> | Best Website Development Company In Pakistan
                </div>
                <div class="footer-row">
                    Email: info@execudea.com | Phone: +92 336 5707907 | Web: www.execudea.com
                </div>
                <div class="footer-row">
                    Office #02, 2nd Floor, Building 140 I&T Center G9/1 Islamabad, Pakistan
                </div>
            </div>
        </div>
    </div>
</body>
</html>