<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{public function msg(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
    
        $emailContent = [
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];
    
        Message::create([
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);
    
        Mail::to('rashid.khan.maitla13@gmail.com')->send(new ContactMessage($emailContent));
    
        return back()->with('status', 'Your message has been sent successfully!');
    }
    
}
