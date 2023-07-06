@extends('layouts.app')

@section('content')
<div class="h-100" style="padding-top:100px;">
	<div class="row h-100 align-items-center">

	
		<div class="col-lg-3 col-md-6 col-sm-12">
			<h2>{{ $event->title }}</h2>
			<a href="{{ route('events.index' )}}" class="btn btn-success">Back</a>
		</div>
</div>

@endsection