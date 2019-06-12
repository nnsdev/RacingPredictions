@extends('layout.app')

@section('content')
<div class="container-lg py-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="list-group">
                @foreach($races as $race)
                @if($race->race_start != null && now()->greaterThan($race->race_end))
                    <a href="/race/{{ $race->id }}/results" class="list-group-item list-group-item-action disabled">
                        {{ $race->name }}
                    </a>
                @elseif(now()->greaterThan($race->race_start) && now()->lessThan($race->race_end))
                <a href="/race/{{ $race->id }}" class="list-group-item list-group-item-action list-group-item-success">
                    <strong>LIVE:</strong> {{ $race->name }}
                </a>
                @else
                <a href="/race/{{ $race->id }}" class="list-group-item list-group-item-action active">{{ $race->name }} ({{ $race->race_start }})</a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
