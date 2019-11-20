@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Album') }} 
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.album.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="280px">Action</th>
                        </tr>
                    
                        @foreach ($albums as $album)
                    
                        <tr>
                    
                            <td>{{ ++$i }}</td>
                            <td><a href="/storage/uploads/album/{{ $album->image }}"><img src="/storage/uploads/album/{{ $album->image }}" alt="" width="60px"> </a> </td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->description }}</td>
                            <td>
                    
                                <form action="{{ route('admin.album.destroy',$album->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('admin.album.show',$album->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('admin.album.edit',$album->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                    
                            </td>
                    
                        </tr>
                    
                        @endforeach
                    
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{-- {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }} --}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $albums->links() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
