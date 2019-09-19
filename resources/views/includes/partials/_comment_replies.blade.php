
 @foreach($comments as $comment)
 <div class="display-comment pl-5">
    {{-- <strong>{{ $comment->user->name }}</strong> --}}
    <div class="pt-2 pr-2">
        <div class="media">
            <img src="{{$comment->user->picture}}" width="40px" class="rounded mr-3" alt="{{$comment->user->name}}">
            <div class="media-body">
                <h6 class="m-0 font-weight-bold">{{ $comment->user->name }}
                    <span class="float-right">{{ !! !empty($comment->created_at) ? $comment->created_at->diffForHumans() : $comment->created_at }}</span>
                </h6>
                
                {{ $comment->body }}
                <div class="reply-button pt-1 pb-1">
                    @if(count($comment->replies))
                        <a type="button" class="btn btn-sm btn-outline-secondary" data-toggle="collapse" href="#collapse-reply-{{ $comment->id }}"><i class="far fa-comments"></i> {{count($comment->replies)}} Reply</a>
                    @endif
                    @if($logged_in_user)
                    <a type="button" class="btn btn-sm btn-outline-primary float-right" data-toggle="collapse" href="#collapse-{{ $comment->id }}"><i class="fa fa-reply"></i></a>
                    @else
                        <a href="{{route('frontend.auth.login')}}" class="btn btn-sm btn-outline-primary float-right" >Login to reply <i class="fa fa-reply"></i></a>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
        {{-- <a class="btn btn-sm btn-primary" id="reply" data-toggle="collapse" href="#collapse-{{ $comment->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
            Reply
        </a> --}}
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
    <div class="collapse" id="collapse-reply-{{ $comment->id }}">  
     @include('includes.partials._comment_replies', ['comments' => $comment->replies])
    </div>
 </div>
@endforeach