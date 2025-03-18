<div id="phone-book">
    <h1>Phone Book Contact</h1>

    <ul>
        @foreach ($contacts as $contact)
            <li wire:key="{{$contact['id']}}">
                <div class="mb-10">
                    <p>Name: {{$contact['name']}}</p>
                    <p>Phone: {{$contact['phone']}}</p>
                    <p>Address: {{$contact['address']}}</p>
                </div>
            </li>
        @endforeach
    </ul>

    <form wire:submit.prevent="addContact">
        <div class="form-control">
            <label for="name">Name</label>
            <input class="form-input" type="text" name="name" id="name" wire:model="newContact.name" placeholder="Enter your name">
        </div>
        <div class="form-control">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" wire:model="newContact.phone" placeholder="Enter your phone number">
        </div>

        <div class="form-control">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" wire:model="newContact.address" placeholder="Enter your address">
        </div>

        <div class="form-action mt-5">
            <button type="submit" class="px-5 py-5 bg-gray-300 w-32 h-16 text-xs text-center">Save</button>
        </div>
    </form>
</div>
