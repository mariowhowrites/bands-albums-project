@extends('layout')

@section('content')
  <header>
    <h1>Edit Band</h1>
  </header>
  <section>
    <form action="{{ route('band.update', compact('band')) }}" method="POST">
      @csrf
      @method('PUT')

      <p class="font-bold mb-1 mt-4">Albums</p>
      <ul>
        @foreach ($band->albums as $album)
          <li>{{ $album->name }}</li>
        @endforeach
      </ul>

      <div class="flex flex-col items-start mt-4">
        <label for="band[name]" class="font-bold mb-1">Name</label>
        <input type="text" name="band[name]" id="band-name" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $band->name }}">
      </div>

      <div class="flex flex-col items-start mt-4">
        <label for="band[start_date]" class="font-bold mb-1">Start Date</label>
        <input type="date" name="band[start_date]" id="band-start-date" class="border shadow rounded bg-grey-lighter py-2" value="{{ $band->start_date }}">
      </div>

      <div class="flex flex-col items-start mt-4">
        <label for="band[website]" class="font-bold mb-1">Website</label>
        <input type="text" name="band[website]" id="band-website" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $band->website }}">
      </div>

      <div class="flex items-start mt-4 items-center">
        <label for="band[still_active]" class="font-bold mb-1">Still Active?</label>
        <input type="checkbox" name="band[still_active]" id="band-still-active" class="border shadow rounded bg-grey-lighter py-2 ml-2" @if($band->still_active) checked @endif>
      </div>

      <button class="px-2 py-1 rounded-full border border-black bg-blue-lighter no-underline text-black mr-2 mt-6 hover:shadow hover:bg-blue-light font-bold">Update Band</button>
    </form>
  </section>
@endsection