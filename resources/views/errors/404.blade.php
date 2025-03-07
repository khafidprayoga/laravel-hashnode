@extends('layouts.app')

@section('title', "Page Not Found")

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
