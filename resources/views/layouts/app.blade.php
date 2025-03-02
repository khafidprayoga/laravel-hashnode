@extends('layouts.base')

@section('body')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
    @vite([ 'resources/js/highlight.min.js'])
    <script>document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((el) => {
                hljs.highlightElement(el);
            });
        });</script>
@endsection
