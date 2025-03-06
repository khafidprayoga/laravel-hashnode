<?php

namespace App\Http\Controllers;

use App\Services\HashnodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private HashnodeService $hashnode;

    public function __construct()
    {
        $this->hashnode = new HashnodeService();
    }

    public function show(Request $request)
    {
        $slug = Str::after($request->path(), "/");
        $page = $this->hashnode->getPage($slug);

        // empty page
        if (is_null($page)) {
            abort(404);
        };

        return view('page.show', [
            'pageTitle' => $page['title'],
            'page' => $page
        ]);
    }
}
