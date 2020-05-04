@extends('layouts.app')

@section('content')
<div class="container">  
  <h2>Create Post Confirmation</h2>
  <form action="">
    <div class="row form-gp">
      <p>Title</p>
      <input type="hidden">Su Su
      <!-- <label for="" class="st-label">*</label> -->
    </div>
    <div class="row form-gp">
      <p>Description</p>
      <p>This is confirm post.</p>
      <!-- <textarea name="" id="" cols="25" rows="5"></textarea> -->
      <!-- <label for="" class="st-label">*</label> -->
    </div>
    <div class="row form-gp">
      <input type="button" value="Create" class="btn btn-primary ml-4 mx-4">
      <input type="button" value="Clear" class="btn btn-outline-success">
    </div>
  </form>   

</div>

@endsection