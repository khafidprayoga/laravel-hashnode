@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <nav id="navigation">
        <ul id="left-navigation">
            <li>
                <a href="{{ route('blog.index') }}" class="btn btn-primary">
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
        @php
            $hasHeading = preg_match('/^#{1,6}\s+\S+/m', $post['content']['markdown']);
        @endphp
        @if($hasHeading)
            <div id="post-toc">
                <span>Table of Contents</span>
                <x-toc>
                    {!! $post['content']['markdown'] !!}
                </x-toc>
            </div>
        @endif

        <article id="post-detail">
            <div id="post-head">
                <h1 class="post-title">{{ $post['title'] }}</h1>
                @if(!is_null($post['coverImage']))
                    <img src="{{ $post['coverImage']['url'] }}" alt="{{ $post['title'] }}" class="post-cover-image"
                         loading="lazy" wire:loading:.remove>
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
                            @php
                                $slug = $tag['slug'].'---'.$tag['id'];

                            @endphp
                            <li>
                               <a href="{{
                                    route('blog.tags', [
                                        'tag'=> $slug,
                                        'tagName'=> $tag['name'],
                                        ])
                            }}">{{ $tag['name'] }}</a>
                           </li>
                        @endforeach
                    </ul>
                </span>
                    @endif

                    @if($hasHeading)
                        <div id="post-toc-mobile">
                            <span>Table of Contents</span>
                            <x-toc>
                                {!! $post['content']['markdown'] !!}
                            </x-toc>
                        </div>
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
