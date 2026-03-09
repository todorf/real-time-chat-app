@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-start min-vh-100 mt-4">
        <div class="card flex-fill mt-5">
            <div class="card-tittle">
                <h3 class="mx-3 my-3">{{ $title }}</h3>
            </div>

            <div class="card-body">
                <livewire:conversations.create-edit :conversation="$conversation" />
            </div>
        </div>
    </div>
@endsection