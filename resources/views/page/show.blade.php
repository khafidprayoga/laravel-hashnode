@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <nav id="navigation">
        <ul id="left-navigation">
            <li>
                <a  href="{{ route('blog.index') }}" class="btn btn-primary">
                    << back to home
                </a>
            </li>
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
    <main id="main-content">
        <article id="post-detail">
            <div id="post-head">
                <h1 class="post-title">{{ $page['title'] }}</h1>
                <div class="post-meta">

                </div>
            </div>
            <div id="post-body">
                <div class="post-content">
                    {!! Purifier::clean($page['content']['html']) !!}
                </div>
            </div>
            <div id="post-footer">
            </div>
        </article>
    </main>

    {{-- init highlight.js parser--}}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((el) => {
                hljs.highlightElement(el);
            });
        });
    </script>
@endsection
