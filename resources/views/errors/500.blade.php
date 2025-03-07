@extends('layouts.app')

@section('title', "Internal Server Error")

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
                <h1 class="post-title">Internal Server Error -
                    <x-clarity-sad-face-line class="w-5 h-5 inline-block"/>
                </h1>
            </div>
            <div id="page-body">
                Oops... something error happened. Please try again later.
            </div>
            <div id="page-footer">
            </div>
        </section>
    </main>
@endsection
