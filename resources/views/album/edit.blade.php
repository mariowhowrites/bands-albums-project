@extends('layout')

@section('content')
<header>
  <h1>Edit Album</h1>
</header>
<section>
  <form action="{{ route('album.update', compact('album')) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="flex flex-col items-start mt-4">
      <label for="album[name]" class="font-bold mb-1">Name</label>
      <input type="text" name="album[name]" id="album-name" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $album->name }}">
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[band_id]" class="font-bold mb-1">Band</label>
      <select name="album[band_id]" id="album-band-id" value="{{ $album->band_id }}" class="bg-grey-lighter py-2 pl-1 rounded shadow">
        @foreach ($bands as $band)
          <option value="{{ $band->id }}" @if($band->id === $album->band->id) selected @endif>{{ $band->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[recorded_date]" class="font-bold mb-1">Recorded Date</label>
      <input type="date" name="album[recorded_date]" id="album-recorded-date" class="border shadow rounded bg-grey-lighter py-2" value="{{ $album->recorded_date }}">
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[release_date]" class="font-bold mb-1">Release Date</label>
      <input type="date" name="album[release_date]" id="album-release-date" class="border shadow rounded bg-grey-lighter py-2" value="{{ $album->release_date }}">
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[number_of_tracks]" class="font-bold mb-1">Number of Tracks</label>
      <input type="number" name="album[number_of_tracks]" id="album-number-of-tracks" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $album->number_of_tracks }}">
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[label]" class="font-bold mb-1">Label</label>
      <input type="text" name="album[label]" id="album-label" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $album->label }}">
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[producer]" class="font-bold mb-1">Producer</label>
      <input type="text" name="album[producer]" id="album-producer" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $album->producer }}">
    </div>

    <div class="flex flex-col items-start mt-4">
      <label for="album[genre]" class="font-bold mb-1">Genre</label>
      <input type="text" name="album[genre]" id="album-genre" class="pl-2 border shadow rounded bg-grey-lighter py-2" value="{{ $album->genre }}">
    </div>

    <button class="px-2 py-1 rounded-full border border-black bg-blue-lighter no-underline text-black mt-6 mr-2 hover:shadow hover:bg-blue-light font-bold">Update Album</button>
  </form>
</section>
@endsection