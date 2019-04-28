@extends('layout')

@section('content')
    <div id="album-index" data-albums="{{ $albums->toJson() }}" data-bands="{{ $bands->toJson() }}"></div>
@endsection