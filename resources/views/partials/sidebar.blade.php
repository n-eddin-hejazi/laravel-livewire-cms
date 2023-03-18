<div class="col-md-4">
    <div class="card">
        <h5 class="card-header p-3">Categories</h5>
        <div class="card-body">
            <ul class="nav flex-column p-0" style="list-style: none !important;">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/') }}">all categories ( {{ $posts_number }})</a>
                </li>
                @foreach($categories as $cat)
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">{{ $cat->title }} ({{ $cat->posts->count() }})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
