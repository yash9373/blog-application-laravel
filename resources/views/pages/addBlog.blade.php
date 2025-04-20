@extends('welcome')

@section('content')
    <div class="container my-5">
        <div class="col-md-8 mx-auto">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h3 class="mb-0">Create a Blog Post</h3>
                </div>
                <div class="col-md-4 text-md-end text-center mt-3 mt-md-0">
                    <a class="btn btn-primary" href="{{ url('/') }}" role="button"><- Back</a>
                </div>
            </div>
            <form action="{{ route('addBlog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"
                        placeholder="Enter blog description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection