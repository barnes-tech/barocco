@extends('layouts.app')

@section('content')
<!-- title, video/high res image background + btn navigation-->
<section class="mainhead">
  @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
                  @if (session('error'))
                      <div class="alert alert-warning" role="alert">
                          {{ session('error') }}
                      </div>
                  @endif
  <video autoplay muted loop>
    <source src="{{ asset('video/websiteBarocco.mp4') }}" type="video/mp4">
  </video>
  <div class="container h-100">
    @if($config->display_brand)
    <div class="row h-100 align-items-center">
      <div class="text-center">
        <a href="#about"><img src="{{ asset('img/logoWithBack.png') }}" alt="Barocco bar and restaurant" class="img-fluid"/></a>
      </div>
    </div>
    @endif
  </div>
</section>
<!-- divider Start -->

<!-- divider end -->

<!--about section container-->

  <section id="about">
    <div class="about-grid">
      <div class="aboutContent">

        <div class="row h-100 align-items-center">
          <div class="aboutText text-center">
            <div class="arches">
              <img src="{{ asset('img/svg/PiqueBrown.svg')}}" class="img-fluid" alt="">
              <img src="{{ asset('img/svg/PiqueBrown.svg')}}" class="img-fluid" alt="">
              <img src="{{ asset('img/svg/PiqueBrown.svg')}}" class="img-fluid" alt="">
              <img src="{{ asset('img/svg/PiqueBrown.svg')}}" class="img-fluid" alt="">
            </div>
            <h1 class="tileText">{{ $config->about_head }}</h1>

            {!! $config->about_text !!}
            <a href="#events">What's on?</a>
            <div class="tables">
              <img src="{{ asset('img/svg/TableWineLeft.svg')}}" class="img-fluid" alt="">

            </div>
          </div>
        </div>
      </div>
      <!--image grid-->
      <div class="aboutImg">
        <!-- first row-->
        <div class="square">
          <img onclick="openModal('img/BarClose.jpg')" src="{{ asset('img/BarClose.jpg')}}">
        </div>
        <div class="square">
          <img onclick="openModal('img/BarDetail.jpg')" src="{{ asset('img/BarDetail.jpg')}}">
        </div>
        <div class="square">
          <img onclick="openModal('img/BarLong.jpg')" src="{{ asset('img/BarLong.jpg')}}">
        </div>
        <!-- second row-->
        <div class="square">
          <img onclick="openModal('img/BarTopAngle.jpg')" src="{{ asset('img/BarTopAngle.jpg')}}">
        </div>
        <div class="square">
          <img onclick="openModal('img/CanopyFront.jpg')" src="{{ asset('img/CanopyFront.jpg')}}">
        </div>
        <div class="square">
          <img onclick="openModal('img/BarTop.jpg')" src="{{ asset('img/BarTop.jpg')}}">
        </div>
        <!-- third row-->
        <div class="square">
          <img onclick="openModal('img/EspressoMartini.jpg')" src="{{ asset('img/EspressoMartini.jpg')}}">
        </div>
        <div class="square">
          <img onclick="openModal('img/PinkLemon.jpg')" src="{{ asset('img/PinkLemon.jpg')}}">
        </div>
        <div class="square">
          <img onclick="openModal('img/OrangeMint.jpg')" src="{{ asset('img/OrangeMint.jpg')}}">
        </div>
      </div>
    </div>
    <!--modal -->
    <script>

    function openModal(source) {
        document.getElementById('imgModal').style.display = "block";
        document.getElementById('img01').setAttribute('src',source);
        console.log('working')
      }

      function closeModal() {
        document.getElementById('imgModal').style.display = "none";
      }
    </script>
    <div id="imgModal" class>
      <span onclick="closeModal()" class="close">&times;</span>
      <img id="img01" src="">
    </div>
    <!--end of modal-->


  </section>

  <section class="space">
    <!--empty space seperating section with video playback behind-->
  </section>
  <section id="events">
    <div class="row h-100 align-items-center">
      <div class="forward col-lg-3 col-md-5 text-center">

        <h2>{{ $config->events_head}}</h2>
        {!! $config->events_text !!}
      </div>
      <div class="posterWall row col-lg-9 col-md-7 col-sm-12">
        @foreach($events as $event)
          <article class="event col-lg-3 col-md-6 text-center">
            <div class="day">
              {{ $event->day }}
            </div>
            <div class="imgBox">
              <img class="img-fluid" src="{{ asset('img/posts/'.$event->image)}}" alt="{{ $event->title }}">
            </div>
            <h3>{{ $event->title }}</h3>
            <p>{{ $event->desc }}</p>
          </article>
        @endforeach
        {{ $events->links() }}
      </div>
    </div>
  </section>
  <section class="space">
  </section>
  <section id="contact">
    <div class="row h-100 align-items-center">
      <div class="contactText col-lg-6 col-md-6 col-sm-12 text-center">
        <h2>{{ $config->contact_head }}</h2>
        {!! $config->contact_text !!}
      </div>
      <div class="contactForm shadow-lg col-lg-6 col-md-6 col-sm-12">
          <div class="cornerTopLeft"></div>
          <div class="cornerTopRight"></div>
          <div class="cornerBottomLeft"></div>
          <div class="cornerBottomRight"></div>
          <h2 class="text-center">Leave a message</h2>
          <p class="text-center">
            If you can't get hold of us right now leave us a message with the form below.
          </p>
          <form action="{{route('home.contact')}}" method="POST">
            <div>
              <input type="text" name="name" for="name" placeholder="Name..">
            </div>
            <div>
              <input type="text" name="tel" for="tel" placeholder="Telephone..">
            </div>
            <div>
              <input type="text" name="email" for="email" placeholder="Email..">
            </div>
            <div>
              <textarea name="message" for="message" placeholder="Message.."></textarea>
            </div>
            @csrf
            <div class="d-flex justif-content-center">
              <input type="submit" value="Send Message">
            </div>
          </form>
      </div>
    </div>
  </section>



</div>
@endsection
