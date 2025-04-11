<?php

namespace App\Http\Controllers;

use App\Services\HashnodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    private HashnodeService $hashnode;

    public function __construct()
    {
        $this->hashnode = new HashnodeService;
    }

    public function index(Request $request)
    {
        return view('blog.index');

    }

    public function show(string $slug)
    {
        $post = $this->hashnode->getPost($slug);
        if (is_null($post)) {
            abort(404);
        }

        $hasHeadings = Str::contains($post['content']['html'], '</h2>');
        return view('blog.show', [
            'pageTitle' => $post['title'],
            'post' => $post,
            'has_heading' => $hasHeadings,
        ]);
    }

    public function indexByTag(Request $request, string $tag)
    {
        $tagCategoryId = Str::after($tag, '---');
        return view('blog.index')->with('tagId', $tagCategoryId);
    }
}
