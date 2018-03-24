<tr>
    <th>{{ $order->id }}</th>
    <td>{{ $order->user }}</td>
    <td>{{ $order->status }}</td>
    <td>{{ $order->placed }}</td>
    <td>
        @foreach ($order->products as $product)
            <strong><a
                target="_blank"
                href="/products/{{ $product['item'] }}"
            >{{ $products[$product['item']]->name }}</a></strong>&times{{ $product['quantity'] }}<br>
        @endforeach
    </td>
</tr>
