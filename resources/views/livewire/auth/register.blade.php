@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="card px-5 pb-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-3">Register</h2>
                <hr class="py-1">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    @include('forms.__input_text', [
                        'name' => 'name',
                        'placeholder' => 'Name',
                        'type' => 'text',
                    ])
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
                    @include('forms.__input_text', [
                        'name' => 'password_confirmation',
                        'placeholder' => 'Password Confirmation',
                        'type' => 'password',
                    ])

                    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary float-end">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection