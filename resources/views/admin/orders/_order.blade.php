<tr>
    <th>{{ $order->id }}</th>
    <td>{{ $order->user }}</td>
    <td>
        <form class="select" method="POST" action="/admin/orders/{{ $order->id }}">
            <select name="status" class="select" onchange="this.form.submit()">
                <option {{ $order->status === 'Placed' ? 'selected' : '' }} value="Placed">Placed</option>
                <option {{ $order->status === 'Dispatched' ? 'selected' : ''  }} value="Dispatched">Dispatched</option>
                <option {{ $order->status === 'Delivered' ? 'selected' : ''  }} value="Delivered">Delivered</option>
            </select>
        </form>
    </td>
    <td>{{ $order->placed }}</td>
    <td>
        @foreach ($order->products as $product)
            <strong><a
                target="_blank"
                href="/products/{{ $product['item'] }}"
            >{{ $products[$product['item']]->name }}</a></strong>&times;{{ $product['quantity'] }}<br>
        @endforeach
    </td>
</tr>
