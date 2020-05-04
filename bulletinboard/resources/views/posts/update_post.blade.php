@extends('layouts.app')

@section('content')
<div class="container">  
  <h2>Update Post</h2>
  <form action="">
    <div class="row form-gp">
      <p>Title</p>
      <input type="text">
      <label for="" class="st-label">*</label>
    </div>
    <div class="row form-gp">
      <p>Description</p>
      <textarea name="" id="" cols="25" rows="5"></textarea>
      <label for="" class="st-label">*</label>
    </div>
    <div class="form-gp row">
      <p>Status</p>
      <div class="custom-control custom-switch"> 
      <input type="checkbox" class="custom-control-input" id="customSwitches">
      <label class="custom-control-label" for="customSwitches"></label>
    </div>
    </div>
    <div class="row form-gp">
      <input type="button" value="Confirm" class="btn btn-primary ml-4 mx-4">
      <input type="button" value="Clear" class="btn btn-outline-success">
    </div>
  </form>   

</div>

@endsection