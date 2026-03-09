@extends('layouts.app')

@section('title', 'Conversation')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-start min-vh-100 mt-4">
        <div class="row flex-fill mt-5">
            <div class="col-md-9 col-sm-5 mx-auto">
                <h3 class="my-3">{{ $conversation->name }}</h3>
            </div>

            <div class="col-md-9 col-sm-5 mx-auto border position-relative" style="height: 400px;">
                <div class="h-85">
                    <div class="w-100  d-inline-block">
                        <span class="float-start">1</span>
                    </div>
                    <div class="w-100 d-inline-block">
                        <span class="float-end">2</span>
                    </div>
                    <div class="w-100 d-inline-block">
                        <span class="float-start">3</span>
                    </div>
                    <div class="w-100 d-inline-block">
                        <span class="float-start">3</span>
                    </div>
                    <div class="w-100 d-inline-block">
                        <span class="float-end">4</span>
                    </div>
                    <div class="w-100 d-inline-block">
                        <span class="float-end">4</span>
                    </div>
                </div>

                <div class="row w-100 h-15 position-absolute bottom-0 left-0">
                    @include('forms._input_text', [
                        'name' => 'message',
                        'placeholder' => 'Enter message',
                        'margin' => 'mb-0',
                        'class' => 'col-9 col-md-10',
                    ])

                    <div class="col-2">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-5 mx-auto my-3">
                <a href="{{ route('users.conversations', auth()->user()->id) }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection