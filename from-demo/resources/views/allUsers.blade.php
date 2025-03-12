<div>
    <h1>Welcome from all users!</h1>

    <table border="1">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Email verified on</td>
            <td>Created on</td>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
        @endforeach
    </table>
</div>
