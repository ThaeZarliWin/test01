@extends('layouts.app')

@section('content')
<div class="container">  
  <h2>Update User</h2>
  <form action="" class="bullet-user">
    <div class="row form-gp">
      <p>Name</p>
      <input type="text">
      <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Email Address</p>
      <input type="email">
      <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Type</p>
      <select>
        <option selected>-- Choose Type --</option>
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select>
    <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Phone</p>
      <input type="text">
      <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Date</p>
      <input type="date">
      <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Address</p>
      <textarea name="" id="" cols="25" rows="5"></textarea>
      <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Profile</p>
      <input type="file">
      <label for="" class="st-label">*</label>
    </div>
    <div class="profile-img">
      <img id="output" src="./img/default.png" alt="default" />
    </div>
    <div class="row form-gp">
      <input type="button" value="Confirm" class="btn btn-primary ml-4 mx-4">
      <input type="button" value="Clear" class="btn btn-outline-success">
    </div>
  </form>   

</div>

@endsection