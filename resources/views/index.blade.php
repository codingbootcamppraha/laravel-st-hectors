@extends('layout')

@section('content')

    <div id="app"></div>

    <script src="{{ mix('js/app.js') }}"></script>

    <main>
        <form class="search-form" action="" method="get">

            <label for="">
                Search:<br>
                <input type="text" name="s" value="{{ $search_term }}" placeholder="Enter name">
                <br>
                <br>

                <input type="submit" value="Search">

            </label>

            @if (!empty($animals))
                <div class="results">

                    @foreach ($animals as $animal)

                        <a href="{{ route('animal.show', [$animal->id]) }}" class="result">
                            <div class="img">
                                <img src="{{ asset('/images/'.$animal->image->path) }}" alt="{{ $animal->name }} photo" />
                            </div>
                            <div>
                                <div class="name">{{ $animal->name }}</div>
                                <div class="type">{{ $animal->breed }} ({{ $animal->species }})</div>
                                @if ($animal->owner)
                                    <div class="owner"><span>Owned by</span> {{ $animal->owner->first_name . ' ' . $animal->owner->surname }}</div>
                                @endif
                            </div>
                        </a>

                    @endforeach

                </div>
            @endif

        </form>
    </main>

@endsection