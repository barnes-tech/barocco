@extends('layouts.adminlayout')

@section('content')

  <section class="mainhead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-lg-8 col-md-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h1>New item for {{ mb_strtolower($category->category) }}</h1>
                <a href="{{ route('menu.index') }}" class="btn btn-success">Back to menu</a>
              </div>

              <section class="card-body row">
                <form action="{{ route('menu.store') }}" method="POST">
                  <div class="form-group">
                    <input type="text" name="dish" for="dish" class="form-control m-1 p-1" placeholder="Enter dish name..">
                  </div>
                  <div class="form-group">
                    <input type="text" name="ingredients" for="ingredients" class="form-control m-1 p-1" placeholder="About the dish..">
                  </div>
                  <div class="form-group">
                    <input type="text" name="alergens" for="alergens" class="form-control m-1 p-1" placeholder="Allergens..">
                  </div>
                  <div class="form-group">
                    <input type="number" name="cost" for="cost" class="form-control m-1 p-1" step="0.01" min="0" placeholder="Price..">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="category" for="category"  value="{{ $category->id }}">
                  </div>
                  @csrf
                  <input type="submit" class="btn btn-success" value="Add {{ mb_strtolower($category->category)}}">
                </form>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
