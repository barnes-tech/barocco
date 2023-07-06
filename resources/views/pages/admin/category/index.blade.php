@extends('layouts.adminlayout')

@section('content')

  <section class="mainhead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <div class="card">
              <div class="card-header">
                <h1>Categories</h1>
              </div>

              <div class="card-body">
                  {{ $count }}
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
