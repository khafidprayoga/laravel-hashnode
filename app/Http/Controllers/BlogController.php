<?php

namespace App\Http\Controllers;

use App\Services\HashnodeService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private HashnodeService $hashnode;


    public function __construct()
    {
        $this->hashnode = new HashnodeService();
    }

    public function index(Request $request)
    {
        $search = $request->query('search', null);
        $nextCursor = $request->query('nextCursor', null);

        $posts = $this->hashnode->getPosts($search, $nextCursor);

        return view('blog.index', [
            'posts' => $posts
        ]);

    }

    public function show($slug)
    {
        return view('blog.show');
    }
}
