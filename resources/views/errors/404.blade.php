@extends('layouts.app')

@section('title', "Page Not Found")

@section('content')
    <livewire:navigation/>
    <main id="error-content">
        <section id="page-detail">
            <div id="page-head">
                <h1 class="post-title">
                    <x-clarity-sad-face-line class="w-5 h-5 inline-block"/>
                    Not Found
                </h1>
            </div>
            <div id="page-body">
                Page not found, kindly check the url or you can go back to <a href="{{ route('blog.index') }}">home</a>.
                If you think this is an error or dead link, please send me an ticket to <a href="mailto:khafidp@pm.me">khafidp@pm.me</a>.
            </div>
            <div id="page-footer">

                <blockquote>
                    {{ \Illuminate\Foundation\Inspiring::quotes()->random() }}</blockquote>
            </div>
        </section>
    </main>
@endsection
