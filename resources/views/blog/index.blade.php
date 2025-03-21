@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <livewire:navigation/>
    <div id="publications">
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
                    <a href="{{ route('blog.show', ['slug'=>$slug ])}}" wire:navigate>Read More
                        in {{ $costToread }} minutes>>></a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
