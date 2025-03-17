<div>
    @if (session('status'))
        <div class="alert alert-success">
            <h1>
                {{ session('status') }}
            </h1>
        </div>
    @endif
    <form wire:submit="save" class="flex flex-col w-[320px] items-center justify-center mx-auto mt-10">
        <label for="title">Title:</label>
        @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        <input id="title" type="text" wire:model="title">

        <label for="content">Content: </label>
        @error('content') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        <input id="content" type="text" wire:model="content">

        <button type="submit">Save</button>
    </form>
</div>
