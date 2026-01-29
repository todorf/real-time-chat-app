@extends('layouts.app')

@section('title', 'Home')

@section('content')
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
        <button type="submit">Register</button>
    </form>
@endsection