@extends('layouts.public')
@section('content')
@include('public.inc.nav')
<div class="max-w-5xl mx-auto">
	<div class="header py-12 border-b mb-6 px-4 md:px-0">
	<h1 class="text-4xl font-bold mb-2">Speakers</h1>
	<p>Click on a speaker to get more info and see their sermons.</p>
	</div>
	
	<div class="speaker-list">
		@foreach($speakers as $speaker)
		<a href="/churches/{{ $church->id }}/speakers/{{ $speaker->id }}" class="inline-flex flex-col items-center justify-start p-6 w-40">
			<img src="{{$speaker->thumbnail ? $speaker->thumbnail : '/images/speaker.svg'}}" alt="" class="h-24 w-24 mb-4 rounded-full block object-cover">
			<h3 class="font-bold text-center">{{ $speaker->name }}</h3>
			<p class="text-sm italic text-center">{{ $speaker->position }}</p>
		</a>
		@endforeach
	</div>
	<div class="pagination mt-6">
	{{ $speakers->links() }}
	</div>
</div>
@endsection
@push('scripts')

@endpush