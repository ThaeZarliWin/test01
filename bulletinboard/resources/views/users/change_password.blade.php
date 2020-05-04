@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection