@extends('layouts.app')

@section('content')
<div class="container">
  <h2>User List</h2>

  <div class="card-body">
    <form action="/user_list" method="POST">
    @csrf
      <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-2">
          <input type="text" name="name" class="form-control form-control-md mb-4" value="{{ $search->name }}" placeholder="Name">
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
          <input type="text" name="email" class="form-control form-control-md mb-4" value="{{ $search->email }}" placeholder="Email">
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
            <input type="text" name="created_from" value="{{ $search->created_from }}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" class="form-control mb-4" placeholder="Created From">
        </div>
        <div class="col-sm-6 col-md-3 col-lg-2">
          <input type="text" name="created_to" value="{{ $search->created_to }}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" class="form-control mb-4" placeholder="Created To">
        </div>
        <div class="col-lg-4">
          <div class="form-group text-center" style ="display : flex;">
            <button type="submit" class="btn btn-primary btn-md mb-4">Search</button>
            <a href="/create_user" class="btn btn-primary btn-md mb-4 ml-4">Add</a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-responsive-sm">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Create User</th>
            <th scope="col">Phone</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Address</th>
            <th scope="col">Created Date</th>
            <th scope="col">Updated Date</th>
            <th scope="col">Action</th> 
          </tr>
        </thead>
        <tbody>
          @if($users -> count())
            @foreach($users as $user)
              <tr>
                <td>
                  <a href="#" data-toggle="modal" data-target="#show_{{$user->id}}">{{ $user->name }}</a>
                </td>
                <td>{{ $user->email }}</td>

                @if($user ->users)
                <td>{{ $user->users->name }}</td>
                @else
                <td>-</td>
                @endif
                
                <td>{{ $user->phone }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>{{ $user->updated_at->format('Y-m-d') }}</td>
                <td>
                  <a class="btn btn-danger" title="Delete" href="#" data-toggle="modal" data-target="#delete_{{$user->id}}">Delete</a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
      <div class="pagination col-11 justify-content-center">
          {{ $users->appends(request()->except('page'))->links() }}
      </div>
    </form>
  </div>
</div>
@foreach($users as $user)
<div class="modal fade" id="delete_{{ $user->id }}" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p>Delete at : {{ now()->format('h:m:s A e') }} </p>
        <p>Deleted User ID : {{ Auth::user()->id }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <a href="delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
@endforeach
@foreach($users as $user)
<!-- user Detail Modal -->
<div class="modal fade" id="show_{{$user->id}}" role="dialog">
  <div class="modal-dialog" role="document" >
    <div class="card modal-content">
      <div class="card-header modal-header">
        <h3 class="modal-name" id="post-title"></h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="card-body modal-body">
        <div class="row">
          <label class="col-4">Name</label>
          <label class="col-8">{{ $user->name }}</label>
        </div>
        <div class="row">
          <label class="col-4">Email</label>
          <label class="col-8 text-justify">{{ $user->email }}</label>
        </div>
        <div class="row">
          <label class="col-4">Phone</label>
          <label class="col-8">{{ $user->phone }}</label>
        </div>
        <div class="row">
          <label class="col-4">Date Of Birth</label>
          <label class="col-8">{{ $user->dob }}</label>
        </div>
        <div class="row">
          <label class="col-4">Address</label>
          <label class="col-8">{{ $user->address }}</label>
        </div>
        <div class="row">
          <label class="col-4">Last Created At</label>
          <label class="col-8">{{ $user->created_at->format('Y-m-d') }}</label>
        </div>
        @if($user ->users)
        <div class="row">
          <label class="col-4">Created User</label>
          <label class="col-8">{{ $user->users->name }}</label>
        </div>    
        @endif
        <div class="row">
          <label class="col-4">Last Updated At</label>
          <label class="col-8">{{ $user->updated_at->format('Y-m-d') }}</label>
        </div>
        @if($user ->users)
        <div class="row">
          <label class="col-4">Updated User</label>
          <label class="col-8">{{ $user->users->name }}</label>
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
@endsection