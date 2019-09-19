
 @foreach($comments as $comment)
 <div class="display-comment pl-4">
     <strong>{{ $comment->user->name }}</strong>
     <div class="card card-body">{{ $comment->body }}</div>
        <a class="btn btn-sm btn-primary" id="reply" data-toggle="collapse" href="#collapse-{{ $comment->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
            Reply
        </a>
        <div class="collapse" id="collapse-{{ $comment->id }}">
        <div class="card card-body">
            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="comment_body" rows="3"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply" />
                </div>
            </form>        
        </div>
    </div>  
     @include('includes.partials._comment_replies', ['comments' => $comment->replies])
 </div>
@endforeach