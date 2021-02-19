<div class="log-visit">

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

    @if ($visit->id !== null)

        <form action="{{ route('visit.update', ['id' => $visit->id]) }}" method="post">
            @method('put')

    @else

        <form action="{{ route('visit.store') }}" method="post">
        
    @endif

        @csrf


        <div class="form-group{{ $errors->has('happened_at') ? ' has-errors' : '' }}">

            <label for="">When</label>

            @if ($errors->has('happened_at'))
                <ul>
                    @foreach ($errors->get('happened_at') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="text" name="happened_at" value="{{ old('happened_at', $visit->happened_at) }}">

        </div>

        <div class="form-group{{ $errors->has('report') ? ' has-errors' : '' }}">

            <label for="">Report</label>

            @if ($errors->has('report'))
                <ul>
                    @foreach ($errors->get('report') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <textarea name="report" cols="10">{{ old('report', $visit->report) }}</textarea>

        </div>

        <div class="form-group form-actions">

            <input type="submit" value="Save visit">

        </div>

    
    </form>


</div>