@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-10 col-sm-10 col-md-10">
          <h3>User Profile</h3>
        </div>
        <div class="col-2 col-sm-2 col-md-2">
          <a href="/update_user/{{ Auth::user()->id }}" class="btn btn-primary">Edit</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-8 col-md-8">
          <div class="row">
            <label for="name" class="col-4 col-sm-4 col-md-4">Name</label>
            <label for="name" class="col-8 col-sm-8 col-md-8">{{ Auth::user()->name }}</label>
          </div>
          <div class="row">
            <label for="email" class="col-4 col-sm-4 col-md-4">Email Address</label>
            <label for="email" class="col-8 col-sm-8 col-md-8">{{ Auth::user()->email }}</label>
          </div>
          <div class="row">
            <label for="type" class="col-4 col-sm-4 col-md-4">Type</label>
            <label for="type" class="col-8 col-sm-8 col-md-8">@if(Auth::user()->type == '0')Admin @elseif (Auth::user()->type == '1')User @else Visitor @endif</label>
          </div>
          <div class="row">
            <label for="phone" class="col-4 col-sm-4 col-md-4">Phone</label>
            <label for="phone" class="col-8 col-sm-8 col-md-8">{{ Auth::user()->phone }}</label>
          </div>
          <div class="row">
            <label for="dob" class="col-4 col-sm-4 col-md-4">Date of Birth</label>
            <label for="dob" class="col-8 col-sm-8 col-md-8">{{ Auth::user()->dob }}</label>
          </div>
          <div class="row">
            <label for="address" class="col-4 col-sm-4 col-md-4">Address</label>
            <label for="address" class="col-8 col-sm-8 col-md-8">{{ Auth::user()->address }}</label>
          </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4">
          <img src="/img/tempProfile/{{ Auth::user()->profile }}" class="profile border border-info rounded-circle" alt="img" width="100" heigth="100">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection