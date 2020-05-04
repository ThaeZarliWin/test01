@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Post List</h2>

  <div class="card-body">
    <div class="row">
      <div class="col-md-7">
        <form action="#" method="get">
          <div class="form-group row">
            <input type="text" class="form-control col-md-2 offset-md-1" name="search" value="" placeholder="Name">
            <input type="text" class="form-control col-md-2 offset-md-1" name="search" value="" placeholder="Email">
            <input type="text" class="form-control col-md-2 offset-md-1" name="search" value="" placeholder="Created From">
            <input type="text" class="form-control col-md-2 offset-md-1" name="search" value="" placeholder="Created To">
          </div>
        </form>
      </div>
      <div class="form-group col-md-1">
        <a class="btn btn-primary" href="#">Search</a>
      </div>
      <div class="form-group col-md-1">
      <a class="btn btn-primary" href="#">Add</a>
      </div>
    </div>

    <!-- Table -->
    <table class="table table-striped table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Create User</th>
          <th scope="col">Phone</th>
          <th scope="col">Birth Date</th>
          <th scope="col">Address</th>
          <th scope="col">Created Date</th>
          <th scope="col">Updated Date</th>
          <th scope="col">Action</th> 
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">User1</a>
          </td>
          <td>user1@gmail.com</td>
          <td>User 1</td>
          <td></td>
          <td></td>
          <td></td>
          <td>5/10/2019</td>
          <td>5/10/2019</td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">Delete</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">User1</a>
          </td>
          <td>user1@gmail.com</td>
          <td>User 1</td>
          <td></td>
          <td></td>
          <td></td>
          <td>5/10/2019</td>
          <td>5/10/2019</td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">Delete</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">User1</a>
          </td>
          <td>user1@gmail.com</td>
          <td>User 1</td>
          <td></td>
          <td></td>
          <td></td>
          <td>5/10/2019</td>
          <td>5/10/2019</td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">Delete</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" data-toggle="modal" data-target="#showmodal">User1</a>
          </td>
          <td>user1@gmail.com</td>
          <td>User 1</td>
          <td></td>
          <td></td>
          <td></td>
          <td>5/10/2019</td>
          <td>5/10/2019</td>
          <td>
            <a class="btn btn-danger" title="Delete" href="#">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
@endsection