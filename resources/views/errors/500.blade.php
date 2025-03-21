@extends('layouts.app')

@section('title', "Internal Server Error")

@section('content')
    <livewire:navigation/>
    <main id="error-content">
        <section id="page-detail">
            <div id="page-head">
                <h1 class="post-title">
                    <x-clarity-error-solid class="w-5 h-5 inline-block"/>
                    Internal Server Error
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
