@extends('layouts.app')
@section('script')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection
@section('style')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Post Update Confirmation</h3>
    </div>
    <div class="card-body">
      <div class="col-md-10 col-lg-8 mx-auto">
        <form action="/updatePost/{{$post_id}}" method="post">
          @csrf

          <div class="form-group row">
            <label for="title" class="col-4 col-sm-4 col-md-4">Title</label>
            <label for="title" class="col-8 col-sm-8 col-md-8">{{$post->title}}</label>
            <input type="hidden" name="title" value="{{$post->title}}">
          </div>
          <div class="form-group row">
            <label for="desc" class="col-4 col-sm-4 col-md-4">Description</label>
            <label for="desc" class="col-8 col-sm-8 col-md-8 text-justify">{{$post->desc}}</label>
            <input type="hidden" name="desc" value="{{$post->desc}}">
          </div>
          <div class="form-group row">
            <label for="status" class="col-4 col-sm-4 col-md-4">Status</label>
            <div class="col-8 col-sm-8 col-md-8 custom-control custom-switch">
              <input type="checkbox" data-toggle="toggle" data-on="active" data-off="inactive" data-style="round" data-onstyle="success" data-offstyle="danger" id="status" data-toggle="toggle" data-onstyle="success" disabled="disabled" class="custom-control-input ml-2" value="{{$post->status}}"
              @if($post->status=='1' ) {{"checked"}} @endif>
              <input type="hidden" class="form-control col-md-6" name="status" id="customSwitches" value="{{$post->status}}">
              <label class="custom-control-label" for="customSwitches"></label>
            </div>
          </div>
          <div class="form-group">
            <div class="text-center">
              <button type="submit" class="btn btn-primary mr-4">Update</button>
              <a href="/post_list" class="btn btn-light">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection