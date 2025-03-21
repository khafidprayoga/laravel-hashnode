@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <livewire:navigation/>
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
