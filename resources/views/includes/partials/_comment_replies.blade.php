
 @foreach($comments as $comment)
 <div class="display-comment">
    {{-- <strong>{{ $comment->user->name }}</strong> --}}
    <div class="pt-2 pr-2">
        <div class="media">
            <img src="{{$comment->user->picture}}" width="40px" class="rounded mr-3" alt="{{$comment->user->name}}">
            <div class="media-body">
                <h6 class="m-0 font-weight-bold">{{ $comment->user->name }}
                        @if($logged_in_user && $logged_in_user->id == $comment->user->id)
                        <div class="btn-group dropleft float-right">
                            <a href="" class=" ml-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="#comment-section"><i class="fas fa-edit"></i> Edit</a>
                            <a class="dropdown-item" href="{{ route('comments.destroy', $comment) }}"
                                data-method="delete"
                                data-trans-button-cancel="@lang('buttons.general.cancel')"
                                data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                                data-trans-title="@lang('strings.backend.general.are_you_sure')"
                                class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            {{-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a> --}}
                            </div>
                        </div>
                    @endif
                    <span class="float-right"><i class="far fa-clock"></i> {{ !! !empty($comment->created_at) ? $comment->created_at->diffForHumans() : $comment->created_at }}</span>
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
    <div class="collapse pl-5" id="collapse-reply-{{ $comment->id }}">  
     @include('includes.partials._comment_replies', ['comments' => $comment->replies])
    </div>
 </div>
@endforeach