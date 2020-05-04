@extends('layouts.app')

@section('content')
<div class="container">  
  <h2>User Profile</h2>
  <div class="form-group row">
    <div class="col-md-1 offset-md-4">
      <a class="nav-link" href="">Edit</a>
    </div>
  </div>
  <form action="" class="bullet-user">
    <div class="row form-gp">
      <p>Name</p>
      <label for="name" class="col-form-label text-md-left">User 1</label>
    </div>
    <div class="row form-gp">
      <p>Email Address</p>
      <label for="email" class="col-form-label text-md-left"><a href="#">user1@gmail.com</a></label>
    </div>
    <div class="row form-gp">
      <p>Type</p>
      <label for="type" class="col-form-label text-md-left">Admin</label>
    </div>
    <div class="row form-gp">
      <p>Phone</p>
      <label for="phone" class="col-form-label text-md-left">97845123</label>
    </div>
    <div class="row form-gp">
      <p>Date</p>
      <label for="dob" class="col-form-label text-md-left">2004/10/05</label>
    </div>
    <div class="row form-gp">
      <p>Address</p>
      <label for="address" class="col-form-label text-md-left">Yangon</label>
    </div>
  </form>   

</div>

@endsection