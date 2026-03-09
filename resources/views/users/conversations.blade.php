@extends('layouts.app')

@section('title', 'Conversations')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-start min-vh-100 mt-4">
        <div class="card flex-fill mt-5">
            <div class="card-title">
                <h3 class="mx-3 my-3">Conversations</h3>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($conversations as $conversation)
                            <tr>
                                <td>{{ $conversation->id }}</td>
                                <td>{{ $conversation->name }}</td>
                                <td>{{ $conversation->type }}</td>
                                <td>
                                    <a href="{{ route('conversations.show', $conversation->id) }}" class="btn btn-primary">View</a>
                                    <button type="submit" class="btn btn-danger" form="leave-form-{{ $conversation->id }}">Leave</button>
                                    <form
                                      id="leave-form-{{ $conversation->id }}"
                                      method="POST"
                                      action="{{ route('users.conversations.leave', [auth()->user(), $conversation->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('conversations.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection