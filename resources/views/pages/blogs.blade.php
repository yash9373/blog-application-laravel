@php
    use Illuminate\Support\Str;
@endphp

<div class="container my-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($blogs as $blog)

            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">author : <strong>{{ $blog->author }}</strong></h6>
                        <h6 class="card-subtitle mb-2 text-muted">created at : <strong>{{ $blog->created_at }}</strong></h6>
                        <p class="card-text flex-grow-1">{{ str::limit($blog->description, 100, '...')  }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/blogPage/' . $blog->id) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>