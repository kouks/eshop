<tr>
    <th>{{ $index + 1 }}</th>
    <td>{{ $product->name }}</td>
    <td>{{ ['Men', 'Women', 'Kids'][$product->category - 1] }}</td>
    <td>&pound;{{ $product->price }}</td>
    <td>{{ $product->stock }}</td>
    <td><a href="/admin/products/{{ $product->slug }}/edit" class="has-text-link">Edit</a></td>
    <td>
        <a
            href="/admin/products/{{ $product->slug }}/delete"
            class="has-text-danger"
            onclick="return confirm('Do you really want to delete this?')"
        >Delete</a>
    </td>
</tr>
