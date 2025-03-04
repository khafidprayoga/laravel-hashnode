@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <nav id="navigation">
        <ul class="">
            <li>
                <a href="{{ route('blog.index') }}" class="btn btn-primary">
                    << back to home
                </a>
            </li>
        </ul>
        <ul id="right-navigation">
            <li>
                <a href="{{ route('page.about') }}" class="btn btn-primary">
                    about me
                </a>
            </li>
            <li>
                <a href="{{ route('page.contact') }}" class="btn btn-primary">
                    contact
                </a>
            </li>
            <li>
                <a href="{{ route('page.privacy') }}" class="btn btn-primary">
                    privacy policy
                </a>
            </li>
        </ul>
    </nav>
    <article id="post-detail">
        <div id="post-head">
            <h1 class="post-title">{{ $post['title'] }}</h1>
            @if(!is_null($post['coverImage']))
                <img src="{{ $post['coverImage']['url'] }}" alt="{{ $post['title'] }}" class="post-cover-image">
            @endif
            <div class="post-meta">
                <span
                    class="post-date">{{ Carbon::parse($post['publishedAt'])->format('d F Y, H:i:s') }} </span>
                <span class="post-read-estimation">{{ $post['readTimeInMinutes'] }} min read</span>
                @if (!empty($post['tags']))
                    <span class="post-tags m-0 p-0 list-none">
                    Tags:
                    <ul>
                    @foreach ($post['tags'] as $tag)
                            <li>
                               <a href="{{ route('blog.tags', ['tag'=>$tag['slug'] ])}}">{{ $tag['name'] }}</a>
                           </li>
                        @endforeach
                    </ul>
                </span>
                @endif
            </div>
        </div>
        <div id="post-body">
            <div class="post-content">
                {!! Purifier::clean($post['content']['html']) !!}
            </div>
        </div>
        <div id="post-footer">
        </div>
    </article>

@endsection

{{-- init highlight.js parser--}}
<body>
<script>document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((el) => {
            hljs.highlightElement(el);
        });
    });
</script>
</body>
