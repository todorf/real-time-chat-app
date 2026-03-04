@extends('layouts.app')

@section('title', 'Conversations')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-start min-vh-100 mt-4">
        <div class="card flex-fill mt-5">
            <div class="card-tittle">
                <h3 class="mx-3 my-3">Conversations</h3>
                <hr>
                <a href="{{ route('conversations.create') }}" class="btn btn-primary mx-3">Create Conversation</a>
                <a href="{{ route('users.conversations', auth()->user()) }}" class="btn btn-primary">My Conversations</a>
            </div>

            <div class="card-body">
                <table class="table">
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
                                    <a href="{{ route('conversations.edit', $conversation->id) }}" class="btn btn-primary">Edit</a>
                                    <button type="submit" form="join-form-{{ $conversation->id }}" class="btn btn-primary">Join</button>
                                    <button
                                      type="submit"
                                      form="delete-form-{{ $conversation->id }}"
                                      class="btn btn-danger"
                                      onclick="return confirm('Are you sure you want to delete this conversation?')">
                                      Delete
                                    </button>

                                    <form
                                      id="delete-form-{{ $conversation->id }}"
                                      method="POST"
                                      action="{{ route('conversations.destroy', $conversation->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <form
                                      id="join-form-{{ $conversation->id }}"
                                      method="POST"
                                      action="{{ route('users.conversations.join', [auth()->user(), $conversation->id]) }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection