<div>
    {{-- The whole world belongs to you. --}}
    <p class="mt-16">
        {{ $count }}
    </p>
    <div id="action" class="flex flex-col mt-5">

        <button class="text-sm mb-16" wire:click="increment()">Increment +</button>
        <button class="text-sm" wire:click="decrement()">Decrement -</button>
    </div>

</div>
