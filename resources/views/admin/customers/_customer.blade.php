<tr>
    <th>{{ $index + 1 }}</th>
    <td>{{ $customer->name }}</td>
    <td>{{ $customer->email }}</td>
    <td>{{ $customer->shadow ? 'Shadow' : 'Registered' }}</td>
    <td>
        @if ($customer->shadow)
            Shadow User
        @else
            <form class="select" method="POST" action="/admin/customers/{{ $customer->_id }}">
                <select name="admin" class="select" onchange="this.form.submit()">
                    <option {{ $customer->admin ? 'selected' : '' }} value="1">
                        Admin
                    </option>
                    <option {{ $customer->admin ? '' : 'selected' }} value="0">
                        Customer
                    </option>
                </select>
            </form>
        @endif
</tr>
