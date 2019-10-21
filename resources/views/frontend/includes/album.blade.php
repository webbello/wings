<!--==========================
    Call To Action Section
============================-->
<section id="photo_album" class="wow fadeIn pl-3 pr-3">
    {{-- <div class="text-center">
        <album-component />
    </div> --}}
    <div class="row">
        @foreach ($albums as $album)
            <div class="col-md-4">
                <div class="card">
                <a class="btn btn-info" href="{{ route('frontend.photo.gallery.show',$album->id) }}">
                    <img src="/storage/uploads/album/{{ $album->image }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Card title {{$album->title}}</h5>
                    <p class="card-text">{{$album->description}}</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
                <div class="card-footer bg-transparent border-primary"><a href="{{ route('frontend.photo.gallery.show',$album->id) }}" class="btn btn-primary">View</a></div>
                </div>
            </div>
        @endforeach
    </div>
</section><!-- #call-to-action -->