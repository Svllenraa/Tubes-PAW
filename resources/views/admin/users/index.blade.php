@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Users</h1>
    </div>

    <form method="GET" class="mb-4 flex gap-2 items-end">
        <div>
            <label class="block text-sm">Search</label>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Name or email" class="border px-2 py-1">
        </div>
        <div>
            <button class="btn btn-secondary" type="submit">Filter</button>
            <a href="{{ route('admin.users.index') }}" class="ml-2">Clear</a>
        </div>
    </form>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->role ?? 'user' }}</td>
                <td class="border px-4 py-2">{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection
