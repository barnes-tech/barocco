@extends('layouts.adminlayout')

@section('content')

  <section class="admin">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h1>Edit Menu</h1>
                <a href="{{ route('category.create') }}" class="btn btn-success">New Category</a>
              </div>
              @if (session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
              @endif

              <section class="card-body row justify-content-center">
                @foreach($categories as $category)
                <article class="col-md-12 col-md-8">
                  <div class="d-flex justify-content-between">
                    <h2 class="mt-2">{{ $category->category }}</h2>
                    <form action="{{ route('category.delete',$category->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="X" class="btn btn-danger h2">
                    </form>
                  </div>
                  <hr>
                  <div class="row">
                    @foreach($category->dishes as $dish)
                      <div class="dish col-lg-6 col-md-12">
                        <div class="d-flex justify-content-between">
                          <h3>
                            {{ $dish->dish }}
                          </h3>
                          <div>
                            <a class="btn btn-dark" href="{{ route('menu.edit', $dish->id) }}">i</a>
                            <form class="d-inline" method="POST" action="{{ route('menu.delete', $dish->id) }}">
                                @csrf
                                @method('DELETE')
                              <input type="submit" class="btn btn-danger" value="x">
                            </form>
                          </div>
                        </div>
                        <p>
                          {{$dish->ingredients }}
                        </p>
                          <p class="h4">
                            £{{ $dish->cost/100 }}
                          </p>

                        </div>
                    @endforeach
                  </div>
                  <a href="{{route('menu.create', $category->id)}}" class="btn btn-success">New {{$category->category}}</a>
                </article>
                @endforeach
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
