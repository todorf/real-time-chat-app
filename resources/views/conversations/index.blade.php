@extends('layouts.app')

@section('title', 'Conversations')

@section('content')
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <h1>Conversations</h1>

    <a href="{{ route('conversations.create') }}">Create Conversation</a>

    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conversations as $conversation)
                    <tr>
                        <td>{{ $conversation->id }}</td>
                        <td>{{ $conversation->name }}</td>
                        <td>{{ $conversation->type }}</td>
                        <td>{{ $conversation->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <a href="{{ route('conversations.edit', $conversation->id) }}">Edit</a>
                            <form action="{{ route('conversations.destroy', $conversation->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="return confirm('Are you sure you want to delete this conversation?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection