@extends('layouts.app')

@section('title', "Server Maintenance")

@section('content')
    <nav id="navigation">
        <ul id="left-navigation">
        </ul>
        <a id="center-navigation" >
            {{ config('app.name') }}
        </a>
        <ul id="right-navigation">
        </ul>
    </nav>
    <main id="error-content">
        <section id="page-detail">
            <div id="page-head">

                <h1 class="post-title">
                    <x-clarity-rack-server-outline-badged class="w-5 h-5 inline-block"/>
                    Server Maintenance
                </h1>
            </div>
            <div id="page-body">
                Our team is currently working on the website. Please come back later.
            </div>
            <div id="page-footer">
            </div>
        </section>
    </main>
@endsection
