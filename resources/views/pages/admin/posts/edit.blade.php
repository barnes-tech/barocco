@extends('layouts.adminlayout')

@section('content')

  <section class="admin">
    <div class="container">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-12 col-lg-6">
          <div class="post">
              <div class="bar d-flex justify-content-between">
                <h1>Edit {{$post->title }}</h1>
                <a href="{{ route('posts.index') }}" class="btn btn-success">Back</a>
              </div>
              @if (session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
              @endif
              @if (session('error'))
                  <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                  </div>
              @endif
              <section class="card-body row justify-content-center">
                <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">

                  <input type="text" name="title" for="title" class="h2 d-block mx-auto my-3" value="{{ $post->title }}"></input>
                  <input type="text" name="day" for="day" class="h2 d-block mx-auto my-3" placeholder="Date" value="{{ $post->day }}"></input>
                  <div class="square">
                    <img src="{{ asset('img/posts/'.$post->image)}}">
                  </div>
                  <input type="file" name="image" for="image" class="form-control d-block w-75 d-block mx-auto my-3 my-3">
                  <textarea for="desc" name="desc" class="d-block w-75 d-block mx-auto my-3 my-3">{{ $post->desc }}</textarea>
                  @csrf
                  @method('PUT')
                  <input type="submit" class="btn btn-success" value="Update Post">
                </form>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
