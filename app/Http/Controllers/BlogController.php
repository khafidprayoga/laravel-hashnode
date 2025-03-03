<?php

namespace App\Http\Controllers;

use App\Services\HashnodeService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(HashnodeService $hashnodeService)
    {
        return view('blog.index', [
            'posts' => $hashnodeService->getPosts()['edges']
        ]);

    }

    public function show($slug)
    {
        return view('blog.show');
    }
}
