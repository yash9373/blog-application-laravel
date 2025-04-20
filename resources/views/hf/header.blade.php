<!-- resources/views/hf/header.blade.php -->

<div class="bg-white border-bottom sticky-top shadow-sm">
    <div class="container py-3">
        <div class="row align-items-center">

            <div class="col-md-2 text-center text-md-start mb-3 mb-md-0">
                <a href="{{ url('/') }}" class="fw-bold text-primary m-0 text-decoration-none"
                    style="font-size: 2rem; cursor: pointer;">Blogs</a>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <form class="d-flex gap-2" action="{{route('searchBlog')}}" method="GET">
                    <input class="form-control" placeholder="Search" name="search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>

            <div class="col-md-3 d-flex justify-content-center justify-content-md-start gap-2">
                <a class="btn btn-outline-primary" href="{{ url('addBlog') }}">New Blog</a>
                <a class="btn btn-outline-primary" href="/myBlog">My Blogs</a>
            </div>

            <div class="col-md-3 text-center text-md-end">
                <a class="btn btn-outline-danger me-md-2 mb-2 mb-md-0" href="{{ url('logout') }}">Log Out</a>
                <span class="text-muted d-block d-md-inline">Wellcome, {{ Auth::user()->name }}</span>
            </div>

        </div>
    </div>
</div>