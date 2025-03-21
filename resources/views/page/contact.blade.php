@extends('layouts.app')

@section('title', "Guestbook")

@section('head')
    @isset($success_message)
        <meta http-equiv="refresh" content="5;url={{ route('blog.index') }}">
    @endisset
@endsection

@section('content')
    <livewire:navigation/>
    <main id="main-content">
        <article id="post-detail">
            <div id="post-head">
                <h1 class="post-title">Guestbook</h1>
                <div class="post-meta">

                </div>
            </div>
            <div id="post-body">
                <div class="post-content">
                    @if(isset($success_message))
                        <h2>Thanks, for your feedback.</h2>
                        <p>Redirecting back to the post index in 5 second...</p>
                    @else
                        <p>
                            Please dont spam this guestbook, or share sensitive information.
                        </p>
                        <x-form method="POST" action=" {{ route('page.guestbookAction') }} ">
                            <div class="flex flex-col">
                                <x-label class="uppercase block text-xs font-medium text-gray-700 " for="full_name"/>
                                <x-input name="full_name"
                                         class="mt-1 w-full rounded-md border-gray-200 shadow-xs sm:text-sm" autofocus value="{{ old('full_name') }}"/>
                                @error('full_name')<span
                                    class="text-red-500 text-xs font-bold">{{ $message }}</span>@enderror

                            </div>

                            <div class="flex flex-col mt-2">
                                <x-label class="uppercase block text-xs font-medium text-gray-700" for="email"/>
                                <x-input name="email" type="email"
                                         class="mt-1 w-full rounded-md border-gray-200 shadow-xs sm:text-sm" value="{{ old('email') }}"/>
                                @error('email')<span
                                    class="text-red-500 text-xs font-bold">{{ $message }}</span>@enderror
                            </div>

                            <div class="flex flex-col mt-2">
                                <x-label class="uppercase block text-xs font-medium text-gray-700" for="messages"/>
                                <x-textarea name="messages" rows="5"
                                            class="mt-1 w-full rounded-md border-gray-200 shadow-xs sm:text-sm" value="{{ old('messages') }}"/>
                                @error('messages')<span
                                    class="text-red-500 text-xs font-bold">{{ $message }}</span>@enderror
                            </div>

                            <div class="flex flex-col justify-center items-center mt-5 mb-5">
                                <x-turnstile
                                    data-theme="light"
                                    data-callback="onTurnstileSuccess"
                                />
                                <span
                                    class="text-sm font-mono">"By clicking Submit button i am agree to share my data."</span>
                                <button type="submit"
                                        class="
                                    w-[100px] relative inline-flex items-center justify-center
                                    px-6 py-3 border border-transparent text-sm font-medium uppercase rounded-md
                                    text-white bg-gray-500 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300
                                    transition-colors duration-300 ease-in-out
                                    disabled:bg-gray-400 disabled:opacity-50
                                    " disabled="true">
                                    Submit
                                </button>
                            </div>
                        </x-form>
                    @endif
                </div>
            </div>
            <div id="post-footer">
            </div>
        </article>
    </main>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            window.onTurnstileSuccess = function (code) {
                document.querySelector('form button[type="submit"]').disabled = false;
            }

            const form = document.querySelector('form');
            form.addEventListener('submit', function (e) {
                document.querySelector('form button[type="submit"]').disabled = true;
                form.submit();
            });

        })
    </script>
@endsection
