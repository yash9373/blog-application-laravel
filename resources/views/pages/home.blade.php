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
        <form class="mb-4" action="{{ route('filterBlogsByCategory', ['category' => request()->input('category_id')]) }}"
            method="GET">
            <div class="row">
                <div class="col-md-6">
                    <select name="category_id" class="form-control" onchange="this.form.submit()">
                        <option value=""> Select Category </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>


        @include('pages.blogs', ['blogs' => $blogs])
    </div>
@endsection