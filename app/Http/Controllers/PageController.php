<?php

namespace App\Http\Controllers;

use App\Events\SendGuestbook;
use App\Models\Guestbook;
use App\Services\HashnodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

class PageController extends Controller
{
    private HashnodeService $hashnode;

    public function __construct()
    {
        $this->hashnode = new HashnodeService;
    }

    public function show(Request $request)
    {
        $slug = Str::after($request->path(), '/');
        $page = $this->hashnode->getPage($slug);

        // empty page
        if (is_null($page)) {
            abort(404);
        }

        return view('page.show', [
            'pageTitle' => $page['title'],
            'page' => $page,
        ]);
    }

    public function guestbookAction(Request $request)
    {
        $body = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'messages' => 'required',
            'cf-turnstile-response' => ['required', Rule::turnstile()]
        ], [
            'full_name.required' => 'Full name required.',
            'email.required' => 'Email required.',
            'email.email' => 'Must be valid email.',
            'messages.required' => 'Message required.',
            'cf-turnstile-response.required' => 'CAPTCHA verification required.'
        ]);

        //  call the new guestbook event
        SendGuestbook::dispatch($body);

        return view('page.contact', [
            "success_message" => "Thank you for your message."
        ]);
    }
}
