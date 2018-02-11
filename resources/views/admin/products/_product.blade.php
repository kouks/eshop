<tr>
    <th>{{ $index + 1 }}</th>
    <td>{{ $product['name'] }}</td>
    <td>{{ $product['category'] }}</td>
    <td>&pound;{{ $product['price'] }}</td>
    <td>
        <div class="tags has-addons">
            <span class="tag is-primary"><i class="fa fa-minus"></i></span>
            <span class="tag"><b>{{ $product['stock'] }}</b></span>
            <span class="tag is-primary"><i class="fa fa-plus"></i></span>
        </div>
    </td>
    <td><a href="#" class="has-text-link"><i class="fa fa-image"></i></a></td>
    <td><a href="/admin/products/1/edit" class="has-text-link">Edit</a></td>
    <td>
        <a
            href="/admin/products/{{ $product['slug'] }}/delete"
            class="has-text-danger"
            onclick="return confirm('Do you really want to delete this?')"
        >Delete</a>
    </td>
</tr>
