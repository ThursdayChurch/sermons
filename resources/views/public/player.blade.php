@extends('layouts.player')
@section('content')
<main>
<section class="sermon-header w-full pt-12 pb-6 px-6">
	<h1 class="text-4xl font-bold mb-2">{{ $sermon->title }}</h1>
	<div class="flex mb-1">
            <p class="inline-flex items-center text-gray-700 mr-4">@component('svg.calendar') h-4 text-gray-400 mr-1 @endcomponent {{ \Carbon\Carbon::parse($sermon->date)->format('m/d/Y')}}</p>
            <p class="inline-flex items-center text-gray-700 mr-4"><img class="h-4 mr-1 rounded-full" src="{{$sermon->speaker->thumbnail ? $sermon->speaker->thumbnail : '/images/speaker.svg'}}" alt=""> {{$sermon->speaker->name}}</p>
            <p class="inline-flex items-center text-gray-700 mr-4"><img class="h-4 mr-1 rounded-full" src="{{$sermon->series->photo ? $sermon->series->photo  : '/images/series.svg'}}" alt=""> {{$sermon->series->title}}</p>
        </div>
	</section>
	<audio controls="controls" class="w-full max-w-xl mb-4 mx-4"><source src="{{ $sermon->mp3 }}"  type="audio/mp3" /></audio>
	<a class="text-gray-600 underline mx-4" href="/churches/{{ $sermon->church->id }}">Listen to more sermons from {{ $sermon->church->name }}</a>
</main>
@endsection