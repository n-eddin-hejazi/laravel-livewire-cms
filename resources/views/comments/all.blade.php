<div class="commentBody">
    @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <img style="float:left" src="{{ $comment->user->profile_photo_url }}" width="50px" class="rounded-full"/>
                <p class="mt-2 ml-2 me-3" style="display:inline-block;"><strong>{{ $comment->user->name }}</strong></p>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <i class="far fa-clock"></i> <span class="comment_date text-secondary">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="col-8">
                            <span class="cursor-pointer reply-button" style="float: right">
                                <i class="fa-solid fa-reply"></i> <span class="comment_date text-secondary">Add reply</span>
                            </span>
                        </div>
                    </div>
                    <p class="my-3" >{{ $comment->body }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
