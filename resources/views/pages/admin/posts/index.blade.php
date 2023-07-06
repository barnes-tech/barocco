@extends('layouts.adminlayout')

@section('content')
  <section class="admin">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="card bg-dark text-light">
              <div class="card-header d-flex justify-content-between">
                <h1>Manage Posts</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-success">New Event</a>
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
                <p class="p-2">Create, update and delete posts that will appear on the events page.</p>
                <div class="row">
                  @foreach($posts as $post)
                    <article class="post col-lg-4 col-md-12">
                      <div class="day">{{ $post->day }}</div>
                      <div class="bar">
                        <h2 class="h5 p-1 m-0">{{ $post->title }}</h2>
                        <div class="d-flex">
                          <div class="p-1">
                            <a href="{{ route('posts.edit', $post->id)}}" class="edit">Update</a>
                          </div>
                          <form class="p-1 d-inline" method="POST" action="{{ route('posts.delete', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="del" value="Delete">
                          </form>
                        </div>
                      </div>
                      <div class="square">
                        <img src="{{ asset('img/posts/'.$post->image)}}"/>
                      </div>
                      <p>{{ $post->desc }}</p>
                    </article>
                  @endforeach
                </div>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
