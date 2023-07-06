@extends('layouts.app')

@section('content')
  <section class="restaurant">
    <div class="container h-50">
      <div class="row h-100 align-items-center">
        <div class="text-center">
          <h1 class="display-1" style="color:gold;">The Grill<br>At<br>BAROCCO</h1>
        </div>
      </div>
    </div>
    <div class="about">
      <div class="container">
        <div class="row h-100 p-3 align-items-center">
          <div class="text-center" style="color:gold;">
            <h2 class="display-2">Menu</h2>
            <p>Exquisite all day grilled specials.</p>
          </div>
        </div>
        <!--decorative-->
        <div class="cornerTopLeft"></div>
        <div class="cornerTopRight"></div>

      </div>
      <div class="menu">
        <div class="menu-grid">
          @foreach($categories as $category)
          <div class="grid-section">
            <h3 class="text-center">{{$category->category}}</h3>
            @foreach($category->dishes as $dish)
              <div class="menu-dish p-3">
                <h4>{{ $dish->dish }}</h4>
                <p>{{ $dish->ingredients }}. <strong>{{ $dish->alergens }}</strong></p>

                <p>£{{ $dish->cost/100 }}</p>
              </div>
            @endforeach
          </div>
          @endforeach
        </div>
        <div class="cornerBottomRight"></div>
        <div class="cornerBottomLeft"></div>
      </div>
    </div>
  </section>
@endsection
