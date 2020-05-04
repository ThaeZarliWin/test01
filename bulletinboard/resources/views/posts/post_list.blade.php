@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Post List</h2>

  <div class="card-body">
    <div class="row">
      <div class="col-md-5">
        <form action="#" method="get">
          <div class="form-group row">
            <input id="search" type="text" class="form-control col-md-5 offset-md-1" name="search" value="" autocomplete="search" autofocus>
              <div class="col-md-5 offset-md-1">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
          </div>
        </form>
      </div>
      <div class="form-group col-md-2">
      <a class="btn btn-primary" href="#">ADD</a>
      </div>
      <div class="form-group col-md-2">
        <a class="btn btn-primary" href="#">UPLOAD</a>
      </div>
      <div class="form-group col-md-2">
        <form method='post' action="#">
          <button type="submit" class="btn btn-primary">DOWNLOAD</button>
        </form>
      </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">Post Title</th>
          <th scope="col">Post Description</th>
          <th scope="col">Posted User</th>
          <th scope="col">Posted Date</th>
          <th colspan="2" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">Title</a>
          </td>
          <td>fdfd</td>
          <td>dfsfs</td>
          <td>2020/10/3</td>
          <td>
            <a class="btn btn-primary" href="#">Edit</a>
          </td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">
              Delete
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">Title</a>
          </td>
          <td>fdfd</td>
          <td>dfsfs</td>
          <td>2020/10/3</td>
          <td>
            <a class="btn btn-primary" href="#">Edit</a>
          </td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">
              Delete
            </a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">Title</a>
          </td>
          <td>fdfd</td>
          <td>dfsfs</td>
          <td>2020/10/3</td>
          <td>
            <a class="btn btn-primary" href="#">Edit</a>
          </td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">
              Delete
            </a>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</div>
@endsection