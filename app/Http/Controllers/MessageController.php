<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller

{
    

    public function index(Request $request)
    {
        $query = Message::query();

        // Search functionality
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subject', 'like', '%' . $request->search . '%')
                  ->orWhere('message', 'like', '%' . $request->search . '%');
            });
        }

        // Date filter
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $messages = $query->orderBy('created_at', 'desc')->paginate(15);
        
        // Get statistics
        $totalMessages = Message::count();
        $todayMessages = Message::whereDate('created_at', today())->count();
        $thisWeekMessages = Message::where('created_at', '>=', now()->startOfWeek())->count();

        return view('admin.messages.index', compact(
            'messages',
            'totalMessages', 
            'todayMessages',
            'thisWeekMessages'
        ));
    }

    public function destroy($id)
    {
        // Find and delete the message by ID
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function msg(Request $request)
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
    
        Mail::to('rizvisajid4@gmail.com')->send(new ContactMessage($emailContent));
    
        return back()->with('status', 'Your message has been sent successfully!');
    }
    
}
