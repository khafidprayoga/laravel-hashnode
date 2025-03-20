@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <livewire:navigation/>
    <div id="publications">
        @if(!is_null($tagName))
            <span id="publications-tag">Showing post with tag: "{{ $tagName }}" or <a id="center-navigation"
                                                                                      href="{{ route('blog.index') }}"
                                                                                      class="btn btn-primary"
                                                                                      wire:navigate>reset filters</a>.</span>
        @endif

        @foreach($posts as $post)
            @php
                $post = $post['node'];

                $title = $post['title'];
                $brief = $post['brief'];
                $slug = $post['slug'].'--'.$post['id'];
                $costToread = $post['readTimeInMinutes'];
            @endphp
            <div class="publication">
                <h2 class="publication-title">{{ $title}}</h2>
                <div class="publication-brief">
                    {!! Purifier::clean($brief) !!}
                </div>

                <div class="publication-readmore">
                    <a href="{{ route('blog.show', ['slug'=>$slug ])}}" wire:navigate>Read More in {{ $costToread }}
                        minutes>>></a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
