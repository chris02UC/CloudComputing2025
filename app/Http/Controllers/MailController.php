<?php
namespace App\Http\Controllers;


class MailController extends Controller
{
    public function SendEmail(Request $request): void {
        Mail::to(users: $request->email)->send(mailable: new TestMail(data: $req))
    }
}