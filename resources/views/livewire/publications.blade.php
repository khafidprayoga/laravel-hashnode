<div id="publications">
    @if($tagName != '')
        <span id="publications-tag" class="text-sm font-extralight md:mx-auto px-5 md:px-0">Showing post with tag: "{{ $tagName }}" or <a
                href="{{ route('blog.index') }}"
                class="btn btn-primary"
                wire:navigate>reset filters</a>.</span>
    @endif
{{--    <div class="font-mono text-red-500">--}}
{{--        <span>--}}
{{--            {{ $search }}--}}
{{--        </span>--}}
{{--        <span>--}}
{{--            {{ $nextCursor }}--}}
{{--        </span>--}}
{{--    </div>--}}
    @foreach($posts as $post)
        @php
            $post = $post['node'];

            $title = $post['title'];
            $brief = $post['brief'];
            $slug = $post['slug'].'--'.$post['id'];
            $costToread = $post['readTimeInMinutes'];
        @endphp
        <div class="publication" wire:key="{{ $post['id'] }}">
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
    @if($hasNext)
        <div x-intersect="$wire.loadMore" class="mx-auto text-center mt-5 text-sm font-mono">
            <div wire:loading>
                Retrieving post...
            </div>
        </div>
    @else
        <div class="mx-auto  mt-5 h-[50vh]">
            <div class="text-sm font-mono underline text-center">
                <blockquote>
                    <x-clarity-warning-solid class="w-5 h-5 inline-block" />
                    "There are no more post to display"
                    <x-clarity-warning-solid class="w-5 h-5 inline-block" />
                </blockquote>
            </div>
        </div>
    @endif
</div>
