@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Post List</h2>

  <div class="card-body">
    <form action="{{ route('post_list') }}" method="POST" class="form-inline">
      @csrf
      <div class="col-md-12">
        <div class="row form-group text-center">
          <div class="col-sm-12 col-md-5 col-lg-5 text-md-right">
            <input type="text" name="search" class="form-control form-control-md mb-4" value="{{old('search', session('search'))}}" placeholder="Search...">
          </div>
          <div class="col-md-7 col-lg-7">
            <div class="form-group text-center">
              <button type="submit" class="form-group btn btn-primary btn-md mb-4">Search</button>
              @auth
              <a href="{{ route('create_post') }}" class="form-group btn btn-primary btn-md mb-4 ml-4">Add</a>
              <a href="/upload" class="form-group btn btn-primary btn-md mb-4 ml-4">Upload</a>
              @endauth
              @guest

              @endguest
              <a href="/export" class="form-group btn btn-primary btn-md mb-4 ml-4">Download</a>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Table -->
    <table class="table table-striped table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">Post Title</th>
          <th scope="col">Post Description</th>
          <th scope="col">Posted User</th>
          <th scope="col">Posted Date</th>
          @auth
          <th colspan="2" scope="col">Action</th>
          @endauth
        </tr>
      </thead>
      <tbody>
        @if($posts -> count())
        @foreach($posts as $post)
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#show_{{ $post->id }}">{{ $post->title }}</a>
          </td>
          <td>{{ $post->description }}</td>
          @if($post ->users)
          <td>{{ $post->users->name }}</td>
          @else
          <td>-</td>
          @endif
          <td>{{ $post->created_at->format('Y-m-d') }}</td>
          @auth
          <td>
            <a class="btn btn-primary" href="/update_post/{{ $post->id }}">Edit</a>
          </td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#" data-toggle="modal" data-target="#deleteConfirmModal" onclick="deletePost({{$post->id}})">Delete</a>
          </td>
          @endauth
          @guest
          @endguest
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
    <div class="pagination col-11 justify-content-center">
      {{ $posts->appends(request()->except('page'))->links() }}
    </div>
  </div>
</div>

@foreach($posts as $post)
<!-- Post Detail Modal -->
<div class="modal fade" id="show_{{ $post->id }}" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="card modal-content">
      <div class="card-header modal-header">
        <h3 class="modal-name" id="post-title"></h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="card-body modal-body">
        <div class="row">
          <label class="col-4">Title</label>
          <label class="col-8">{{ $post->title }}</label>
        </div>
        <div class="row">
          <label class="col-4">Description</label>
          <label class="col-8 text-justify">{{ $post->description }}</label>
        </div>
        <div class="row">
          <label class="col-4">Status</label>
          <label class="col-8">@if( $post->status ==1 ) Active @else Inactive @endif</label>
        </div>
        <div class="row">
          <label class="col-4">Created At</label>
          <label class="col-8">{{ $post->created_at->format('Y-m-d') }}</label>
        </div>
        @if($post ->users)
        <div class="row">
          <label class="col-4">Created User</label>
          <label class="col-8">{{ $post->users->name }}</label>
        </div>
        @endif
        <div class="row">
          <label class="col-4">Last Updated At</label>
          <label class="col-8">{{ $post->updated_at->format('Y-m-d') }}</label>
        </div>
        @if($post ->users)
        <div class="row">
          <label class="col-4">Updated User</label>
          <label class="col-8">{{ $post->updatedUsers->name }}</label>
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- post delete modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" class="deleteForm">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Are you sure want to delete this post?</p>
          <input type="hidden" id="post_id" name="post_id" class="postID" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger" type="submit">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection