@php

@endphp

@extends('welcome')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    <div class="card-body">
                        <h2 class="card-title mb-3">{{ $blog->title }}</h2>
                        <p class="text-muted mb-2">By <strong>{{ $blog->author }}</strong></p>
                        <p class="card-text">{{ $blog->description }}</p>

                        @if($blog->content)
                            <div class="mt-4">
                                {!! nl2br(e($blog->content)) !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection