@extends('layouts.adminlayout')

@section('content')
  <section class="mainhead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-lg-5 col-md-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h1>New Category</h1> <a href="{{ route('menu.index') }}" class="btn btn-primary h1">Back to menu</a>
              </div>

              <div class="card-body">
                  <form action="{{ route('category.store') }}" method="POST">
                    <div class="form-group inline-form">
                      <input type="text" name="category" for="category" class="form-control m-1 p-1" placeholder="Enter new menu category..">
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Add">
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
