@extends('layout')

@section('content')

    <div class="animal-show">

        <div class="animal-show__top">
            @if ($animal->image)
                <img src="/images/{{ $animal->image->path }}" alt="Photo of {{ $animal->name }}">
            @endif
            <h1>{{ $animal->name }}</h1>
        </div>

        <div class="animal-show__actions">
            <a class="animal-show__edit-button" href="{{ action('Admin\AnimalController@edit', $animal->id) }}">edit</a>
        </div>

        <div class="animal-show__data">
            <div>
                <h2>Owner</h2>
                <div class="animal-show__data-value">{{ $animal->owner->first_name . ' ' . $animal->owner->surname }}</div>
            </div>
            <div>
                <h2>Breed</h2>
                <div class="animal-show__data-value">{{ $animal->breed ?: '--' }}</div>
            </div>
            <div>
                <h2>Age</h2>
                <div class="animal-show__data-value">{{ $animal->age ? $animal->age . ($animal->age == 1 ? ' year' : ' years') : '--' }}</div>
            </div>
            <div>
                <h2>Weight</h2>
                <div class="animal-show__data-value">{{ $animal->weight ?: '--' }} kg</div>
            </div>
        </div>

        @include('animal.log-visit')
        
    </div>

@endsection