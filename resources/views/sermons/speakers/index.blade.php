@extends('layouts.speakers')
@section('sermonsContent')
<div class="w-full max-w-xl mx-auto mt-24 text-gray-800 px-4 lg:px-0 ">
<div class="flex justify-between mb-6 items-center">
 <h1 class="text-xl font-bold text-blue-500 flex-grow">Speakers</h1>   
<a href="/speakers/create" class="font-bold inline-flex text-lg items-center text-green-500 hover:text-green-700">@component('svg.add-solid') h-4 mr-2 @endcomponent Add Speaker</a>
</div>

@if($speakers->count() > 0)
<ul>
    @foreach($speakers as $speaker)
    <li class="bg-white flex md:h-32 w-full rounded shadow mb-6 flex-wrap">
        <img src="{{$speaker->thumbnail ? $speaker->thumbnail : '/images/speaker.svg'}}" alt="" class="w-full h-48 md:h-32 md:w-32 rounded-tl rounded-bl object-cover">
        <div class="text p-4 flex-grow flex flex-col justify-center">
                  <p class="mb-2"> <span class="font-bold text-lg">{{$speaker->name}}</span> | {{$speaker->position}}</p>
                  @if($speaker->bio)
                  <p class="text-sm leading-loose mb-2">
                      {{Str::limit($speaker->bio, 60)}}
                  </p>
                  @endif
            <div class="flex-grow"></div>
            <div class="flex justify-end w-full">
                <form action="/speakers/{{$speaker->id}}" method="POST" class="mr-6">
                    @csrf 
                    @method('delete')
                    <button class="text-gray-500 font-bold hover:text-gray-700">Delete</button>
                </form>
                <a href="/speakers/{{$speaker->id}}/edit" class="text-gray-500 font-bold hover:text-gray-700">Edit</a>
            </div>
        </div>
    </li>
    @endforeach
</ul>
{{ $speakers->links() }}

@else
@component('includes.note', ['color' => 'blue'])
<strong>Looks like your church doesn't have any speakers yet.</strong> <br> Before you can add a sermon, you must have at least one speaker added. <a class="underline" href="/speakers/create">You can create one here.</a>
@endcomponent
@endif
</div>
@endsection