@extends('layout')

@section('content')
  {{-- <aside class="flex items-baseline">
    <header>
      <h1 class="my-6">All Bands</h1>
    </header>
    <div class="ml-6">
      <a class="font-bold" href="{{ route('band.create') }}">Add New Band</a>
    </div>
  </aside>
  <section class="border rounded" dusk="band-index">
    <article class="flex w-full pt-2 px-2 pb-1 border-b-2 font-bold">
      <span class="w-2/5">Name</span>
      <span class="w-1/5">Start Date</span>
      <span class="w-1/5">Website</span>
      <span class="w-1/5">Still Active?</span>
      <span class="w-1/5">Actions</span>
    </article>
    @foreach ($bands as $band)
      <article dusk="{{ $band->name }}" class="flex w-full px-2 py-3 hover:shadow @if($loop->even) bg-grey-light @endif">
        <span class="w-2/5">{{ $band->name }}</span>
        <span class="w-1/5">{{ $band->getFormattedStartDate() }}</span>
        <span class="w-1/5">{{ $band->website }}</span>
        <span class="w-1/5">{{ $band->getFormattedActiveStatus() }}</span>
        <span class="w-1/5">
          <a href="{{ route('band.edit', compact('band')) }}" class="px-2 py-1 rounded-full border border-black bg-blue-lighter no-underline text-black mr-2 hover:shadow hover:bg-blue-light">Edit</a>
          <a href="{{ route('band.delete', compact('band')) }}" class="px-2 py-1 rounded-full border border-black bg-red-lighter no-underline text-black hover:shadow hover:bg-red-light">Delete</a></span>
      </article>
    @endforeach
  </section> --}}
  <aside class="flex items-baseline">
    <header>
        <h1 class="my-6">All Bands</h1>
    </header>
    <div class="ml-6">
        <a class="font-bold" href="/band/create">
            Add New Band
        </a>
    </div>
  </aside>
  <div id="band-index" data-bands="{{ $bands->toJson() }}"></div>
@endsection