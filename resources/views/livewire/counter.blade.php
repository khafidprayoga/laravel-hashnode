<div>
    <form>
        <label for="counter">
            Count: <span x-text="$wire.count"></span>
        </label>
        <input type="number" id="counter" wire:model.live="count">

        <button type="button" wire:click="$refresh">...</button>
        <button type="button" x-on:click="$wire.$refresh()">...</button>

        <button type="reset" x-on:click="$wire.todo  = '1'">Reset</button>
        <button
            type="button"
            wire:click="delete"
            wire:confirm="Are you sure you want to delete this post?"
        >
            Delete post
        </button>
    </form>
</div>
