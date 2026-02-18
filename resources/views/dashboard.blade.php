@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <a href="{{ route('conversations.index') }}">Conversations</a>
    <a href="{{ route('users.conversations', auth()->user()) }}">My Conversations</a>
@endsection