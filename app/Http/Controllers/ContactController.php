<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::raw("Message from {$data['name']} ({$data['email']}):\n\n{$data['message']}", function ($message) use ($data) {
            $message->to('admin@example.com')
                    ->subject('New Contact Form Submission');
        });

        return back()->with('success', 'Message sent (check logs)');
    }
}
