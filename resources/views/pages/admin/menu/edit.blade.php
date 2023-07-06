@extends('layouts.adminlayout')

@section('content')

  <section class="mainhead">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h1>Edit {{ $menuItem->dish }}</h1>
                <a href="{{ route('menu.index') }}" class="btn btn-success">Back to menu</a>
              </div>

              <section class="card-body row">
                <form action="{{ route('menu.update', $menuItem->id) }}" method="POST">
                  <div class="form-group">
                    <input type="text" name="dish" for="dish" class="form-control m-1 p-1" value="{{ $menuItem->dish }}">
                  </div>
                  <div class="form-group">
                    <input type="text" name="ingredients" for="ingredients" class="form-control m-1 p-1" value="{{ $menuItem->ingredients }}">
                  </div>
                  <div class="form-group">
                    <input type="text" name="alergens" for="alergens" class="form-control m-1 p-1" value="{{ $menuItem->alergens }}">
                  </div>
                  <div class="form-group">
                    <input type="number" name="cost" for="cost" class="form-control m-1 p-1" step="0.01" min="0" value="{{ $menuItem->cost/100 }}">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="category" for="category"  value="{{ $menuItem->category_id }}">
                  </div>
                  @csrf
                  @method('PUT')
                  <input type="submit" class="btn btn-success" value="Update menu">
                </form>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
