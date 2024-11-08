<h2>Manage Users</h2>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_blocked ? 'Blocked' : 'Active' }}</td>
                <td>
                    @if (!$user->is_blocked)
                        <form action="{{ route('admin.blockUser', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">Block User</button>
                        </form>
                    @else
                        <form action="{{ route('admin.unblockUser', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="button">Unblock User</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>Manage Requests</h2>
<table>
    <thead>
        <tr>
            <th>Pet Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Hourly Rate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($afspraken as $afspraak)
            <tr>
                <td>{{ $afspraak->huisdier->name }}</td>
                <td>{{ $afspraak->start_datum }}</td>
                <td>{{ $afspraak->eind_datum }}</td>
                <td>€{{ $afspraak->uurtarief }}</td>
                <td>
                    <form action="{{ route('admin.deleteRequest', $afspraak->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button">Delete Request</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>