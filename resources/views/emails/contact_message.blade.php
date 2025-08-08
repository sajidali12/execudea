<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #eaeaea;
        }
        .header h1 {
            font-size: 28px;
            color: #4db8b3;
            margin: 0;
            text-transform: uppercase;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            margin: 10px 0;
            font-size: 16px;
            line-height: 1.6;
        }
        .content p strong {
            color: #4db8b3;
        }
        .footer {
            font-size: 14px;
            color: #777;
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #eaeaea;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Contact Message</h1>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Subject:</strong> {{ $message->subject }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $message->message }}</p>
            <p><strong>Received:</strong> {{ $message->created_at->format('F d, Y \a\t g:i A') }}</p>
        </div>
        <div class="footer">
            <p>New message has been received !.</p>
        </div>
    </div>
</body>
</html>
