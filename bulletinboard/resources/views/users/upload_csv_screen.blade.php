@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Upload CSV File</h2>
  <div class="cv-file-form">
    <p>Import File from:</p>
    <div class="border">
        <input type="file" class="mt-4 ml-4">
        <div class="row form-gp">
          <input type="button" value="Change" class="btn btn-primary ml-4 mx-4">
          <input type="button" value="Clear" class="btn btn-outline-success">
        </div>
    </div>
  </div>
</div>
@endsection