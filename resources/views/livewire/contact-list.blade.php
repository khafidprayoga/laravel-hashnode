
<div id="phone-book">
    <h1>Phone Book Contact</h1>

    <ul>
        <li>
            <label for="name">Name: </label>
            <span id="name" x-text="$wire.name"></span>
        </li>
        <li>
            <label for="phone">Phone:</label>
            <span id="phone">+{{ $phone }}</span>
        </li>
        <li>
            <label for="address">Address:</label>
            <span id="address" x-text="$wire.address"></span>
        </li>
    </ul>
</div>
