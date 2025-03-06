<?php

namespace App\Http\Controllers;

use App\Services\HashnodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

    public function show(string $slug)
    {
        $post = $this->hashnode->getPost($slug);
        if (is_null($post)) {
            abort(404);
        };
        return view('blog.show', [
            'pageTitle' => $post['title'],
            'post' => $post
        ]);
    }

    public function indexByTag(Request $request, string $tag)
    {
        $search = $request->query('search', null);
        $nextCursor = $request->query('nextCursor', null);

        $tagName = $request->query('tagName', null);
        $tagCategoryId = Str::after($tag, '---');

        $posts = $this->hashnode->getPosts(
            search: $search,
            nextCursor: $nextCursor,
            tags: [$tagCategoryId]
        );

        return view('blog.index_tags', [
            'posts' => $posts,
            'tagName' => $tagName
        ]);
    }
}
