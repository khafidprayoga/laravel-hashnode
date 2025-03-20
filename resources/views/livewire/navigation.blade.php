<nav id="navigation">
    <ul id="left-navigation">
        @if($showBackBtn)
            <li>
                <a href="{{ url()->previous() }}" wire:navigate.hover>
                    << back to home
                </a>
            </li>
        @endif
    </ul>
    <a id="center-navigation" href="{{ route('blog.index') }}" wire:navigate.hover>
        {{ config('app.name') }}
    </a>
    <ul id="right-navigation">
        <li>
            <a href="{{ route('page.about') }}" class="text-lg font-light" wire:navigate
               wire:current="font-semibold underline">
                about me
            </a>
        </li>
        <li>
            <a href="{{ route('page.contact') }}" class="text-lg font-light"
               wire:current="font-semibold underline">
                contact
            </a>
        </li>
        <li>
            <a href="{{ route('page.privacy') }}" class="text-lg font-light" wire:navigate
               wire:current="font-semibold underline">
                privacy policy
            </a>
        </li>
    </ul>
</nav>
