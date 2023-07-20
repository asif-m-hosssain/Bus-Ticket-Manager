<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    @foreach($cartItems as $cartItem)
    <tr>
        <td>{{ $cartItem->name }}</td>
        <td>{{ $cartItem->price }}</td>
        <td>
            <form action="{{ route('shopping.removeFromCart') }}" method="POST">
                @csrf
                <input type="hidden" name="item_id" value="{{ $cartItem->id }}">
                <button type="submit">Remove</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
