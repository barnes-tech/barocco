@extends('layouts.adminlayout')

@section('content')

  <section class="admin">
    <div class="container">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-12 col-lg-6">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h1>Create new event post</h1>
                <a href="{{ route('posts.index') }}" class="btn btn-success">Back</a>
              </div>
              @if (session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
              @endif
              <section class="card-body row justify-content-center">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                  <label class="form-label" for="">Event Title:</label>
                  <input type="text" name="title" for="title" class="h2 w-100"></input>
                  <label class="form-label" for="">Date and time:</label>
                  <input type="text" name="day" for="day" class="h2 w-100"></input>
                  <label class="form-label" for="image">Image:</label>
                  <input type="file" name="image" for="image" class="form-control">
                  <label class="form-label" for="">Description:</label>
                  <textarea for="desc" name="desc" class="w-100"></textarea>
                  @csrf
                  <input type="submit" class="btn btn-primary" value="Add Event">
                </form>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
