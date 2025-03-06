@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <nav id="navigation">
        <ul id="left-navigation">
        </ul>
        <a id="center-navigation" href="{{ route('blog.index') }}" class="btn btn-primary">
            {{ config('app.name') }}
        </a>
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
    <div id="publications">
        @if(!is_null($tagName))
        <span id="publications-tag">Showing post with tag: "{{ $tagName }}" or <a id="center-navigation" href="{{ route('blog.index') }}" class="btn btn-primary">reset filters</a>.</span>
        @endif

        @foreach($posts as $post)
            @php
                $post = $post['node'];

                $title = $post['title'];
                $brief = $post['brief'];
                $slug = $post['slug'].'--'.$post['id'];
                $costToread = $post['readTimeInMinutes'];
            @endphp
            <div>
                <h2 class="publication-title">{{ $title}}</h2>
                <div class="publication-brief">
                    {!! Purifier::clean($brief) !!}
                </div>

                <div class="publication-readmore">
                    <a href="{{ route('blog.show', ['slug'=>$slug ])}}">Read More in {{ $costToread }} minutes>>></a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
