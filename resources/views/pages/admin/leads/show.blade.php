@extends('layouts.adminlayout')

@section('content')
<section class="mainhead">
    <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-lg-6 col-md-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h1 class="h2">
                  New message from {{ ucfirst($lead->name) }}
                </h1>
                <a href="{{ route('dashboard')}}" class="btn btn-success">Back</a>
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
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
                  <article class="alert alert-dark">
                  	<div class="alert {{$lead->resolved ? 'alert-success' : 'alert-danger'}}">
                  		This lead is {{ $lead->resolved ? 'resolved' : 'unresovled'}}.
                  	</div>
                  	<p class="m-0">Message:</p>
                  	<p class="p-1 alert alert-light" height="300px">{{ $lead->message }}</p>
                  	<div class="row">
	                  	<div class="col">
		                  	<p class="p-1">From {{ ucfirst($lead->name) }},<br>recieved at {{ $lead->created_at }}</p>
		                  	<div class="p-1 d-flex justify-content-between">
		                  		<p>Tel: </p><a class="btn btn-primary" href="tel:{{ $lead->tel }}">{{ $lead->tel }}</a>
		                  	</div>
		                  	<div class="d-flex justify-content-between">
		                  		<p>Email: </p><a class="btn btn-primary" href="email:{{ $lead->email }}">{{ $lead->email }}</a>
		                  	</div>
		                </div>

		                <div class="col">
		                	<form class="p-1 w-100" action="{{ route('leads.update',$lead->id)}}" method="POST">
		                	<p>Notes:</p>
		                	<textarea class="w-100 h-100" for="notes" name="notes">{{ $lead->notes }}</textarea>
		                	@csrf
		                	@method('PUT')
		                	<button type="submit" value="Update notes" class="btn btn-success">Update notes</button>
		                	</form>
		                	<form class="p-1 w-100" action="{{ route('leads.resolved', $lead->id) }}" method="POST">
		                		@csrf
		                		@method('PUT')
		                		<button type="submit" class="btn {{ $lead->resolved ? 'btn-dark' :'btn-success'}}">{{ $lead->resolved ? 'Mark as new' :'Resolve Lead'}}</button>
		                	</form>
		                </div>
		            </div>
                  </article>
              </div>
          </div>
        </div>
      </div> 
    </div>
  </section>
@endsection