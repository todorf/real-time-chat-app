@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="card px-5 pb-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-3">Login</h2>
                <hr class="py-1">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @include('forms.__input_text', [
                            'name' => 'email',
                            'placeholder' => 'Email',
                            'type' => 'email',
                        ])
                        @include('forms.__input_text', [
                            'name' => 'password',
                            'placeholder' => 'Password',
                            'type' => 'password',
                        ])
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary float-end">Login</button>
                    </form>
            </div>
        </div>
    </div>
@endsection