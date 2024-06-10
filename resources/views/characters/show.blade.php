@extends('layouts.layout')

@section('title', $character['name'] . ' - Rick and Morty Character')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

    <h1 class="mb-4 text-center">{{ $character['name'] }}</h1>

    <div class="card vertical-card mx-auto">
        <img src="{{ $character['image'] }}" class="card-img-top" alt="{{ $character['name'] }}">
        <div class="card-body">
            <h5 class="card-title">{{ $character['name'] }}</h5>
            <p class="card-text"><strong>Status:</strong> {{ $character['status'] }}</p>
            <p class="card-text"><strong>Species:</strong> {{ $character['species'] }}</p>

            @if($character['type'] != '')
            <p class="card-text"><strong>Type:</strong> {{ $character['type'] }}</p>
            @endif

            <p class="card-text"><strong>Gender:</strong> {{ $character['gender'] }}</p>
            <p class="card-text"><strong>Origin:</strong> {{ $character['origin']['name'] }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $character['location']['name'] }}</p>
            <p class="card-text"><strong>First Episode:</strong> {{ $character['episode'][0] }}</p>
            <a href="{{ route('characters.index', ['status' => $status, 'species' => $species, 'page' => $page]) }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>

@endsection
