@extends('layouts.app')

@section('title', 'Conversations')

@section('content')
    <h1>Conversations</h1>

    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <tbody>
            @foreach ($conversations as $conversation)
                <tr>
                    <td>{{ $conversation->id }}</td>
                    <td>{{ $conversation->name }}</td>
                    <td>{{ $conversation->type }}</td>
                    <td>
                        <a href="{{ route('conversations.show', $conversation->id) }}">View</a>
                        <form action="{{ route('users.conversations.leave', [auth()->user(), $conversation->id]) }}" method="POST">
                            @csrf    
                            @method('DELETE')
                            <button type="submit">Leave</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </div>
@endsection