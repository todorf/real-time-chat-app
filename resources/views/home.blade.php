@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-5">
            <h2 class="card-title text-center">Chat App</h2>
            <div class="card-body">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        </div>
    </div>
@endsection