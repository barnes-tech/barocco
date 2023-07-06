@extends('layouts.app')

@section('content')
<div class="h-100" style="padding-top:65px;">
	<div class="row h-100 bg-dark text-light" style="min-height:100vh;">

	@foreach($events as $event)
		<div class="col-lg-3 col-md-6 col-sm-12 p-0">
			<article class="p-3 text-center">
				<h2>{{ $event->title }}</h2>
				<img src="{{ asset('')}}"
				<a href="{{ route('events.show', [$event->id, $event->slug] )}}">{{$event->title }}</a>
			</article>
		</div>
	@endforeach
</div>

@endsection