@extends('layout.app')

@section('content')
<div class="container w-full mx-auto pt-24">
    <div class="flex flex-col justify-center">
        <div class="w-full p-3">
            <div class="bg-black border border-grey-darkest rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-1">
                        <h5 class="uppercase text-grey-light text-center">Upcoming Races</h5>
                        <table class="text-white w-full text-xs text-left">
                            <thead>
                                <tr>
                                    <th>Series</th>
                                    <th>Race Name</th>
                                    <th>Date</th>
                                    <th>Predicting opens</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($upcoming as $race)
                                <tr>
                                    <td>{{ $race->series->name }}</td>
                                    <td>{{ $race->name }}</td>
                                    <td>{{ $race->starts_at }} ({{ $race->starts_at->diffForHumans() }})</td>
                                    <td>
                                        @if(now()->greaterThan($race->starts_at->subWeek()))
                                        <a href="/race/{{ $race->id }}" class="text-green">Predicting open</a>
                                        @else
                                        {{ $race->starts_at->subWeek() }} ({{ $race->starts_at->subWeek()->diffForHumans() }})</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center text-white">Prediction Lineup</h2>
        @foreach($series as $serie)
        <div class="w-full p-3">
            <div class="bg-black border border-grey-darkest rounded shadow p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-1">
                        <h5 class="uppercase text-grey-light text-center">{{ $serie->name }}</h5>
                        <table class="text-white w-full text-xs text-left">
                            <thead>
                                <tr>
                                    <th>Race Name</th>
                                    <th>Date</th>
                                    <th>Predicting opens</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serie->races as $race)
                                <tr>
                                    <td>{{ $race->name }}</td>
                                    <td>{{ $race->starts_at }} ({{ $race->starts_at->diffForHumans() }})</td>
                                    <td>
                                        @if(now()->greaterThan($race->starts_at->subWeek()))
                                        <a href="/race/{{ $race->id }}" class="text-green">Predicting open</a>
                                        @else
                                        {{ $race->starts_at->subWeek() }} ({{ $race->starts_at->subWeek()->diffForHumans() }})</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection