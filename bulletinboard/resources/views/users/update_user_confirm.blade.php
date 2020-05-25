@extends('layouts.app')

@section('content')
<!-- <div class="container">  
  <h2>Update User Confirmation</h2>
  <form action="" class="bullet-user">
    <div class="row form-gp">
      <label for="name" class="text-label">{{ __('Name') }}</label>
      <label for="name" class="text-md-left">User 1</label>
    </div>
    <div class="row form-gp">
      <label for="email" class="text-label">{{ __('Email Address') }}</label>
      <label for="email" class="text-md-left"><a href="#">user1@gmail.com</a></label>
    </div>
    <div class="row form-gp">
      <label for="password" class="text-label">{{ __('Password') }}</label>
      <label for="type" class="text-md-left">Admin</label>
    </div>
    <div class="row form-gp">
      <label for="phone" class="text-label">{{ __('Phone') }}</label>
      <label for="phone" class="text-md-left">97845123</label>
    </div>
    <div class="row form-gp">
      <label for="dob" class="text-label">{{ __('Date Of Birth') }}</label>
      <label for="dob" class="text-md-left">2004/10/05</label>
    </div>
    <div class="row form-gp">
      <label for="address" class="text-label">{{ __('Address') }}</label>
      <label for="address" class="text-md-left">Yangon</label>
    </div>
    <div class="profile-img">
      <img id="output" src="./img/default.png" alt="default" />
    </div>
    <div class="row form-gp">
      <input type="button" value="Update" class="btn btn-primary ml-4 mx-4">
      <input type="button" value="Clear" class="btn btn-outline-success">
    </div>
  </form>   

</div> -->
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Update User Confirmation</h3>
    </div>
    <div class="card-body">
      <div class="col-12 col-sm-12 col-md-10 mx-auto">
        <form action="/update/{{$user_id}}" method="post">
        @csrf
          <div class="row">
            <div class="col-12 col-sm-6 col-md-8">
              <div class="form-group row">
                <label for="name" class="col-4 col-sm-5 col-md-4">Name</label>
                <label for="name" class="col-8 col-sm-4 col-md-6">{{ $user->name }}</label>
                <input type="hidden" name="name" value="{{ $user->name }}">
              </div>
              <div class="form-group row">
                <label for="email" class="col-4 col-sm-5 col-md-4">Email Address</label>
                <label for="email" class="col-8 col-sm-4 col-md-6">{{ $user->email }}</label>
                <input type="hidden" name="email" value="{{ $user->email }}">
              </div>
              <div class="form-group row">
                <label for="type" class="col-4 col-sm-5 col-md-4">Type</label>
                @if($user->type == 1 || $user->type == null)
                  <label for="type" class="col-8 col-sm-4 col-md-6">User</label>
                @else
                  <label for="type" class="col-8 col-sm-4 col-md-6">Admin</label>
                @endif
                <input type="hidden" name="type" value="{{$user->type }}">
              </div>
              <div class="form-group row">
                <label for="phone" class="col-4 col-sm-5 col-md-4">Phone</label>
                <label for="phone" class="col-8 col-sm-4 col-md-6">{{ $user->phone }}</label>
                <input type="hidden" name="phone" value="{{ $user->phone }}">
              </div>
              <div class="form-group row">
                <label for="dob" class="col-4 col-sm-5 col-md-4">Date of Birth</label>
                <label for="dob" class="col-8 col-sm-4 col-md-6">{{ $user->dob }}</label>
                <input type="hidden" name="dob" value="{{ $user->dob }}">
              </div>
              <div class="form-group row">
                <label for="address" class="col-4 col-sm-5 col-md-4">Address</label>
                <label for="address" class="col-8 col-sm-4 col-md-6">{{ $user->address }}</label>
                <input type="hidden" name="address" value="{{ $user->address }}">
              </div>
              <div class="form-group row">
                <div class="col-12 col-md-8 mx-auto">
                  <button type="submit" class="btn btn-primary  mr-4">Update</button>
                  <a href="/update_user/{{$user_id}}" class="btn btn-light">Cancel</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
              <input type="hidden" id="profile" name="filename" value="{{ $user->filename }}" class="form-control" onchange="readURL(this);">
              <img src="/img/tempProfile/{{ $user->filename }} " class="profile border border-info rounded-circle" alt="profile">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection