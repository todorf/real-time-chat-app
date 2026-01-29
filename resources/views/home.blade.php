@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
@endsection