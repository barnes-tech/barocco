@extends('layouts.adminlayout')

@section('content')
  <section class="admin">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="card bg-dark text-light">
              <div class="card-header d-flex justify-content-between">
                <h1>Website configuration</h1>
                <a href="{{ route('dashboard') }}" class="btn btn-success">Back</a>
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
              <section class="row card-body">

                <div class="bg-dark text-light p-3 col-md-12 col-lg-6">
                  <h2 class="h3">Meta information</h2>
                  <p>Edit website description and keywords for search engines.</p>
                  <form action="{{ route('config.meta', $config->id) }}" method="POST" class="p-3 rounded bg-primary text-light">
                    <h5>Website Description</h5>
                    <p>A structured sentence describing your website read by search engines</p>
                    <textarea rows="3" class="w-100 alert alert-success" name="description" for="description" value="{{ $config->description }}">{{ $config->description }}</textarea>
                    <h5>Website keywords</h5>
                    <p>Search related keywords</p>
                    <textarea rows="2" class="w-100 alert alert-success" name="keywords" for="keywords" value="{{ $config->keywords }}">{{ $config->keywords }}
                    </textarea>  
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-dark" value="Update Meta">
                  </form>
                </div>

                <div class="bg-dark text-light p-3 col-md-12 col-lg-6">
                  <h2 class="h3">Website options</h2>
                  <p>Website toggle options.</p>
                  <div class="bg-primary rounded p-3 text-light">

                    <h5>Website Branding</h5>
                    <p>Toggle the over-video branding on the home page.</p>
                    <div class="d-flex space-between">
                      <p class="alert {{ $config->display_brand ? 'alert-success' : 'alert-danger'}}">The Branding {{ $config->display_brand ? 'is ' : 'is not '}} currently displayed.</p>
                      <form action="{{route('config.brand', $config->id )}}" method="POST" class="ms-auto">
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn {{ $config->display_brand ? 'btn-danger' : 'btn-success'}}" value="{{ $config->display_brand ? 'Hide Branding' : 'Show Branding'}}">
                      </form>
                    </div>
                    <h5>Website Menu</h5>
                    <p>Toggle the website menu feature.</p>
                    <div class="d-flex space-between">
                      <p class="alert {{ $config->display_menu ? 'alert-success' : 'alert-danger'}}">The restaurant menu {{ $config->display_menu ? 'is ' : 'is not '}} currently displayed.</p>
                      <form action="{{route('config.menu', $config->id )}}" method="POST" class="ms-auto">
                        @csrf
                        @method('PUT')
                        <input type="submit" class="btn {{ $config->display_menu ? 'btn-danger' : 'btn-success'}}" value="{{ $config->display_menu ? 'Hide menu' : 'Show menu'}}">
                    </form>
                    </div>
                  </div>
                </div>
    
                <div class="bg-dark text-light p-3 col-md-12 col-lg-6">
                  <h2 class="h3">About section</h2>
                  <p>Modify the about section content.</p>
                  <form action="{{route('config.about', $config->id )}}" method="POST" class="bg-primary text-light p-3 rounded ms-auto">
                    <p>About Section Heading:</p>
                    <input type="text" name="about_head" for="about_head" class="h2 alert alert-success w-100" value="{{ $config->about_head}}"></input>
                    <p>About Section Content:</p>
                    <textarea rows="3" class="alert alert-success w-100 why_text" for="about_text" name="about_text" value="{{ $config->about_text}}">{{$config->about_text}}</textarea>
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-dark ms-auto" value="Update about">
                  </form>
                </div>

                <div class="bg-dark text-light p-3 col-md-12 col-lg-6">
                  <h2 class="h3">Events section</h2>
                  <p>Modify the events section ehading and text, to add or remove events from the website go to the <a href="{{route('posts.index')}}">events</a> section.</p>
                  <form action="{{route('config.events', $config->id )}}" method="POST" class="bg-primary text-light p-3 rounded">
                    <p>Events Section Heading:</p>
                    <input type="text" name="events_head" for="events_head" class="h2 alert alert-success w-100" value="{{ $config->events_head}}"></input>
                    <p>Events Section Content:</p>
                    <textarea  row="3" class="w-100 alert alert-success why_text" for="events_text" name="events_text" value="{{ $config->events_text}}">{{$config->events_text}}</textarea>
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-dark" value="Update about">
                  </form>
                </div>
                <div class="p-3 col-md-12 col-lg-6">
                  <h2 class="h3">Contact section</h2>
                  <p>Modify the contact section heading and text</p>
                  <form action="{{route('config.contact', $config->id )}}" method="POST" class="bg-primary rounded p-3">
                    <p>Contact Section Heading:</p>
                    <input type="text" name="contact_head" for="contact_head" class="h2 alert alert-success col-md-12" value="{{ $config->contact_head}}"></input>
                    <p>Contact Section Content:</p>
                    <textarea row="4" class="alert alert-success w-100 why_text" for="contact_text" name="contact_text" value="{{ $config->contact_text}}">{{$config->contact_text}}</textarea>
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-dark" value="Update contact">
                  </form>
                </div>
              </section>
          </div>
        </div>
      </div>
  </section>
@endsection
