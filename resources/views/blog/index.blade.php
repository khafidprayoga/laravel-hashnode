@extends('layouts.app')
@section('title', 'Blog')
@section('content')

    @foreach($posts as $post)

        @php $post = $post['node']; @endphp

        <h2>{{ $post['title'] }}</h2>

        <div>
            {!! Str::limit($post['brief'], 100) !!}
        </div>

        <a href="{{ url($post['slug']) }}">Read More</a>

        <hr>

    @endforeach

@endsection
