@extends('layouts.layout')

@section('title', $character['name'] . ' - Rick and Morty Character')

@section('content')
    <div class="text-center mb-4">
        <h1 class="display-4">{{ $character['name'] }}</h1>
    </div>
    <div class="card">
        <img src="{{ $character['image'] }}" class="card-img-top" alt="{{ $character['name'] }}">
        <div class="card-body">
            <h5 class="card-title">{{ $character['name'] }}</h5>
            <p class="card-text"><strong>Gender:</strong> {{ $character['gender'] }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $character['status'] }}</p>
            <p class="card-text"><strong>Species:</strong> {{ $character['species'] }}</p>
            <p class="card-text"><strong>Origin:</strong> {{ $character['origin']['name'] }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $character['location']['name'] }}</p>
            <a href="{{ route('characters.index', ['status' => $status, 'species' => $species, 'page' => $page]) }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>

@endsection
