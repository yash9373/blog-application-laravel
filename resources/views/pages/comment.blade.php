<!DOCTYPE html>
<html lang="en">

<head>

    <title>commnets</title>
</head>

<body>

    <div class="container mt-5">
        <h4>Comments</h4>

        @forelse($blog->comments as $comment)
            <div class="border rounded p-3 mb-3">
                <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                <p class="mb-1">{{ $comment->content }}</p>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                @if($comment->user->name == Auth::user()->name)
                    <a class="btn btn-outline-danger me-md-2 mb-2 mb-md-0"
                        href="{{ uri('/comments/' . $comment->id) }}">Delete</a>
                    <a class="btn btn-outline-danger me-md-2 mb-2 mb-md-0"
                        href="{{ uri('/comments/edit/' . $comment->id)  }}">Edit</a>
                @endif

            </div>


        @empty
            <p class="text-muted">No comments yet. Be the first to comment!</p>
        @endforelse

        @auth
            <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                <div class="mb-3">
                    <label for="content" class="form-label">Add Comment</label>
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        @else
            <p class="mt-4">You must <a href="{{ route('login') }}">log in</a> to comment.</p>
        @endauth
    </div>
</body>

</html>