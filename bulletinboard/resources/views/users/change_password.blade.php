@extends('layouts.app')

@section('content')
<!-- <div class="container">
  <h2>Change Password</h2> 
  <form action="" class="bullet-user">
    <div class="row form-gp">
      <p>Old Password</p>
      <label for="password" class="col-form-label text-md-left">********</label>
    </div>
    <div class="row form-gp">
      <p>New Password</p>
      <label for="password" class="col-form-label text-md-left">********</label>
    </div>
    <div class="row form-gp">
      <p>Confirm New Password</p>
      <label for="password" class="col-form-label text-md-left">********</label>
    </div>
    <div class="row form-gp">
      <input type="button" value="Change" class="btn btn-primary ml-4 mx-4">
      <input type="button" value="Clear" class="btn btn-outline-success">
    </div>
  </form>
</div> -->

<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Change Password</h3>
    </div>
    <div class="card-body">
      <div class="col-md-10 col-lg-8 mx-auto">
        <form action="/passwordChange/{{ $user_id }}" method="POST">
          @csrf
          @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
          @endforeach 
          <div class="form-group row">
            <label for="oldpassword" class="col-4 col-sm-4 col-md-4">Old Password</label>
            <div class="col-6 col-sm-6 col-md-6">
              <input type="password" name="oldpassword" class="form-control">
            </div>
            <label for="require" class="col-1 col-sm-1 col-md-1 col-form-label text-danger text-md-left">*</label>
          </div>
          <div class="form-group row">
            <label for="newpassword" class="col-4 col-sm-4 col-md-4">New Password</label>
            <div class="col-6 col-sm-6 col-md-6">
              <input type="password" name="newpassword" class="form-control">
            </div>
            <label for="require" class="col-1 col-sm-1 col-md-1 col-form-label text-danger text-md-left">*</label>
          </div>
          <div class="form-group row">
            <label for="confirmpassword" class="col-4 col-sm-4 col-md-4">Password Confrim</label>
            <div class="col-6 col-sm-6 col-md-6">
              <input type="password" name="confirmpassword" class="form-control">
            </div>
            <label for="require" class="col-1 col-sm-1 col-md-1 col-form-label text-danger text-md-left">*</label>
          </div>
          <div class="form-group row">
            <div class="col-8 col-md-8 mx-auto">
              <button type="submit" class="btn btn-primary  mr-4">Change</button>
              <button type="reset" class="btn btn-light">Clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection