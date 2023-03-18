@extends('layouts.main')
@section('content')
    <div class="col-md-12">
        <p class="h4 my-4">
            {{ $title }}
        </p>
    </div>
    <div class="col-md-8">
        @includewhen(count($posts) == 0, 'alerts.empty', ['msg' => 'There are no posts'])
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <img style="float:left" src="{{ $post->user->profile_photo_url }}" width="50px" class="rounded-full"/>
                            <p class="mt-2 ml-2 text-xs me-3" style="display:inline-block;"><strong>{{ $post->user->name }}</strong></p>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <i class="far fa-clock" style="font-size: 0.8em"></i> <span class="text-xs text-secondary">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="col-3">
                                    <i class="fa-solid fa-align-justify" style="font-size: 0.8em"></i> <span class="text-secondary mt-4 text-xs">{{ $post->category->title }}</span>
                                </div>
                                <div class="col-3">
                                    <i class="fa-regular fa-comment" style="font-size: 0.8em"></i> <span class="text-xs text-secondary">{{ $post->comments->count() }} Comments</span>
                                </div>
                            </div>
                            <h4 class="my-2 h4" ><a href="#">{{ $post->title }}</a></h4>
                            <p class="card-text mb-2">{!! Str::limit($post->body , 200) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @include('partials.sidebar')

@endsection
