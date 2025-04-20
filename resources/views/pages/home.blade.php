@extends('welcome')
@section('content')
    <div class="container ">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h4 class="card-title mb-5">Explore the blogs</h4>
        @include('pages.blogs', ['blogs' => $blogs])
    </div>
@endsection()