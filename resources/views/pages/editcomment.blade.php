@extends('welcome')

@section('content')
    <div class="container mt-5">
        <h4>Edit Comment</h4>

        <form action="{{ uri('/comments/update/' . $comment->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="content" class="form-label">Comment</label>
                <textarea name="content" class="form-control" rows="3" required>{{ $comment->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection