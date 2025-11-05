<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    // Show the public contact form
    public function create()
    {
        return view('contact');
    }

    // Store the form submission AND send the email
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'appointment_date' => 'required|date|after_or_equal:today',
            'personal_code' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // 1. Save to database
        $submission = ContactFormSubmission::create($request->all());

        // Prepare data for email, EXCLUDING personal_code
        $emailData = $submission->toArray();
        unset($emailData['personal_code']); // Remove the code before sending

        Mail::to($submission->email)->send(new TestMail($emailData));

        // 3. Redirect back to the contact form with a success message
        return redirect()->route('contact.create')->with('success', 'Thank you! Your message has been sent and saved.');
    }

    // --- Admin Methods ---

    public function showAdminLogin()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        if ($request->input('password') === 'password123') {
            $request->session()->put('is_admin', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['password' => 'Invalid password.']);
    }

    public function adminDashboard()
    {
        if (!session('is_admin')) {
            return redirect()->route('admin.login');
        }

        $submissions = ContactFormSubmission::latest()->get();
        return view('admin.dashboard', ['submissions' => $submissions]);
    }
    
    public function adminLogout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect()->route('admin.login');
    }
}