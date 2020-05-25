@extends('layouts.app')


@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      <h3>Update Post</h3>
    </div>
    <div class="card-body">
      <div class="col-md-10 col-lg-8 mx-auto">
        <form action="/update_post_confirm/{{$post_detail->id}}" method="POST">
          @csrf
          <div class="form-group row">
            <label for="title" class="col-3 col-sm-3 col-md-4">Title</label>
            <div class="col-8 col-sm-8 col-md-6">
              <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post_detail->title) }}">
              @error('title')
                <label class="text-danger">{{ $message }}</label>
              @enderror
            </div>
            <label for="require" class="col-1 col-sm-1 col-md-2 col-form-label text-danger text-md-left">*</label>
          </div>
          <div class="form-group row">
            <label for="desc" class="col-3 col-sm-3 col-md-4">Description</label>
            <div class="col-8 col-sm-8 col-md-6">
              <textarea name="desc" id="desc" class="form-control">{{ old('desc', $post_detail->description) }}</textarea>
              @error('desc')
                <label class="text-danger">{{ $message }}</label>
              @enderror
            </div>
            <label for="require" class="col-1 col-sm-1 col-md-2 col-form-label text-danger text-md-left">*</label>
          </div>
          <div class="form-group row">
            <label for="status" class="col-3 col-sm-3 col-md-4">Status</label>
            <div class="col-8 col-sm-8 col-md-6 custom-control custom-switch">
            @if($post_detail->status)
              <input type="checkbox" class="custom-control-input" id="customSwitches" name="status" checked>
              <label class="custom-control-label" for="customSwitches"></label>
            @else
              <input type="checkbox" class="custom-control-input" id="customSwitches" name="status">
              <label class="custom-control-label" for="customSwitches"></label>
            @endif
            </div>
          </div>
          <div class="form-group">
            <div class="text-center">
              <button type="submit" class="btn btn-primary mr-4">Confirm</button>
              <button type="reset" class="btn btn-light">Clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection