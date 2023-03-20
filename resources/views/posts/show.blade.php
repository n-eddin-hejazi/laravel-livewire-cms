@extends('layouts.main')

@section('style')
    <style>
    .post-img {
        text-align: justify;
        max-width: 600px;
        max-height: 600px
    }
    </style>
@endsection

@section('content')
    <p class="h4 my-4">{{ $post->title }}</p>
    <input id="postId" type="hidden" value="{{ $post->id }}">
    <div class="col-md-8">
        <div class="bg-white p-5">
            <img style="float:left" src="{{ $post->user->profile_photo_url }}" width="50px" class="rounded-full"/>
            <p class="mt-2 ml-2 text-xs me-3" style="display:inline-block;"><strong>{{ $post->user->name }}</strong></p>
            <div class="row mt-2 mb-4">
                <div class="col-3">
                    <i class="far fa-clock"  style="font-size: 0.8em"></i> <span class="comment_date text-xs text-secondary">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <div class="col-3">
                    <i class="fa-solid fa-align-justify"  style="font-size: 0.8em"></i> <span class="comment_date text-xs text-secondary">{{ $post->category->title }}</span>
                </div>
                <div class="col-3">
                    <i class="fa-regular fa-comment"  style="font-size: 0.8em"></i> <span class="comment_date text-xs text-secondary">{{ $post->comments->count() }} Comments</span>
                </div>
            </div>
            @if(file_exists(public_path('/storage/images/' . $post->image_path)))
                <img class="mb-4 mx-auto post-img" src="{{ asset('/storage/images/'.$post->image_path) }}" alt="">
            @endif
            <p class="lh-lg">{!! $post->body !!}</p>

            @auth
            <!-- comments form -->
            <div class="row form-group mt-5" >
                <div class="col-lg-12 col-md-6 col-xs-11">
                    <form action="{{ route('comment.store') }}" id="comments" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control @error('body') is-invalid @enderror" rows="5" name="body" placeholder="Write new comment..."></textarea>
                            @error('body')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-dark mt-3">Comment</button>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </form>
                </div>
            </div>
            @else
                <div class="alert alert-info mt-3" role="alert">
                    Please login to be able to write a comment
                </div>
            @endauth
        </div>
        <div id="comments" class="p-0 word-break container mt-5">
            <h4 class="mb-5">Comments</h4>
            @include('comments.all', ['comments' => $comments, 'post_id' => $post->id])
        </div>
    </div>
    @include('partials.sidebar')
@endsection
