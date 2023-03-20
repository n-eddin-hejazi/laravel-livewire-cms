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
                        <a class="nav-link text-dark" href="{{ route('category', [$cat->id, $cat->slug]) }}">{{ $cat->title }} ({{ $cat->posts->count() }})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Last Comments</h5>
        <ul class="list-group p-0">
            @foreach($recent_comments as $comment)
                <li class="list-group-item">
                    <a href="{{ route('posts.show', $comment->Post->slug) }}#comments">
                        <img style="float:left" src="{{$comment->user->profile_photo_url}}" width="40px" class="rounded-full"/>
                        <span class="mt-1 me-1 ml-2 d-inline-block"><strong>{{$comment->user->name}}</strong></span>
                        <span>{{\Illuminate\Support\Str::limit($comment->body, 60) }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
