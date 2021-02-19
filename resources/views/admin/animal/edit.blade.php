@extends('admin.layout')

@section('content')

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
    @endif

    @if ($animal->id !== null)

        <form action="{{ action('Admin\AnimalController@update', ['id' => $animal->id]) }}" method="post">
            @method('put')

    @else

        <form action="{{ action('Admin\AnimalController@store') }}" method="post">
        
    @endif

        @csrf

        <div class="form-group{{ $errors->has('name') ? ' has-errors' : '' }}">

            <label for="">Name</label>

            @if ($errors->has('name'))
                <ul>
                    @foreach ($errors->get('name') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="text" name="name" value="{{ old('name', $animal->name) }}">

        </div>

        <div class="form-group{{ $errors->has('owner_id') ? ' has-errors' : '' }}">

            <label for="">Owner</label>

            @if ($errors->has('owner_id'))
                <ul>
                    @foreach ($errors->get('owner_id') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <select name="owner_id">
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}" {{ $owner->id == old('owner_id', $animal->owner_id) ? ' selected' : ''}}>
                        {{ $owner->first_name . ' ' . $owner->surname }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="form-group{{ $errors->has('breed') ? ' has-errors' : '' }}">

            <label for="">Breed</label>

            @if ($errors->has('breed'))
                <ul>
                    @foreach ($errors->get('breed') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="text" name="breed" value="{{ old('breed', $animal->breed) }}">

        </div>

        <div class="form-group{{ $errors->has('age') ? ' has-errors' : '' }}">

            <label for="">Age</label>

            @if ($errors->has('age'))
                <ul>
                    @foreach ($errors->get('age') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="text" name="age" value="{{ old('age', $animal->age) }}">

        </div>

        <div class="form-group{{ $errors->has('weight') ? ' has-errors' : '' }}">

            <label for="">Weight</label>

            @if ($errors->has('weight'))
                <ul>
                    @foreach ($errors->get('weight') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="text" name="weight" value="{{ old('weight', $animal->weight) }}">

        </div>

        <div class="form-group form-actions">

            <input type="submit" value="Save">

            @if ($animal->id)

                <form action="{{ action('Admin\AnimalController@delete', ['id' => $animal->id]) }}" method="post">
                    @method('delete')
                    @csrf

                    <input type="submit" value="Delete">

                    <a href="{{ action('AnimalController@show', $animal->id) }}">Back to detail</a>
                </form>

            @endif

        </div>

    </form>

    
    
@endsection