@extends('layouts.layout')

@section('title', 'Rick and Morty Characters')

@section('content')
    <h1 class="mb-4 text-center">Rick and Morty Characters</h1>

    <!-- Filtros -->
    <form method="GET" action="{{ route('characters.index') }}" class="filter-form">
        <div class="form-row">
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="alive" {{ request('status') == 'alive' ? 'selected' : '' }}>Alive</option>
                    <option value="dead" {{ request('status') == 'dead' ? 'selected' : '' }}>Dead</option>
                    <option value="unknown" {{ request('status') == 'unknown' ? 'selected' : '' }}>Unknown</option>
                </select>
            </div>
            <div class="col-12 col-md-5 mb-3 mb-md-0">
                <input type="text" name="species" class="form-control" placeholder="Species" value="{{ request('species') }}">
            </div>
            <div class="col-12 col-md-2">
                <button type="submit" class="btn btn-primary btn-block">Filter</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach($characters as $character)
            <div class="col-12 col-md-6 mb-4">
                <div class="card h-100 d-flex flex-row horizontal-card">
                    <div class="img-wrapper">
                        <img src="{{ $character['image'] }}" class="card-img" alt="{{ $character['name'] }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $character['name'] }}</h5>
                        <p class="card-text">{{ $character['status'] }} - {{ $character['species'] }}</p>
                        <p class="card-text"><strong>Last known location: </strong><br>{{ $character['location']['name'] }}</p>
                        <a href="{{ route('characters.show', ['id' => $character['id'], 'status' => request('status'), 'species' => request('species')]) }}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $characters->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
@endsection
