@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role == \App\Models\User::ROLE_USER)
                        User
                    @elseif($user->role == \App\Models\User::ROLE_ADMIN)
                        Admin
                    @elseif($user->role == \App\Models\User::ROLE_COMPANY)
                        Company
                    @elseif($user->role == \App\Models\User::ROLE_COMPANYUSER)
                        Company User
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection