<tr>
    <th>{{ $index + 1 }}</th>
    <td>{{ $customer->name }}</td>
    <td>{{ $customer->email }}</td>
    <td>{{ $customer->shadow ? 'Shadow' : 'Registered' }}</td>
</tr>
