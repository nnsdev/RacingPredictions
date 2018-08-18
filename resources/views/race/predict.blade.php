@extends('layout.app')

@section('content')
<div class="container-lg py-3">
    <div class="row px-4">
        <div class="col-md-12">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 px-5">
            @if(now()->lessThan($race->race_start))
                @include('partials.prediction')
            @else
            <div class="card">
                <div class="card-header">
                    Top 10
                </div>
                <div class="card-body">
                    <leaderboard :userid="{{ Auth::user()->id }}" race="{{ $race->id }}"></leaderboard>
                </div>
            </div>
            @endif
            @include('partials.most_picked')
        </div>
        <div class="col-md-6 px-5">
            <div class="card">
                <div class="card-header">Search for User</div>
                <div class="card-body">
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::pull('error') }}
                    </div>
                    @endif
                    <form action="/dashboard/search" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search for user">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-secondary btn-block" value="Search">
                        </div>
                    </form>
                </div>
            </div>
            @if(now()->greaterThan($race->race_start) && now()->lessThan($race->race_end))
            <div class="card mt-1">
                <div class="card-header">Live Data</div>
                <div class="card-body">
                    <standings race="{{ $race->id }}"></standings>
                </div>
            </div>
            @endif
            @if(now()->lessThan($race->race_start))
            <div class="card mt-1">
                <div class="card-header">Latest 5 Picks</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td scope="col">User</td>
                            <td scope="col">LMP1</td>
                            <td scope="col">LMP2</td>
                            <td scope="col">GTE Pro</td>
                            <td scope="col">GTE Am</td>
                        </tr>
                        @foreach($latest as $pick)
                        <tr>
                            <td><a href="/user/{{ $pick->user_id }}">{{ $pick->user->name }}</a></td>
                            <td>#{{ $pick->lmp1->car_number }} {{ $pick->lmp1->name }}</td>
                            <td>#{{ $pick->lmp2->car_number }} {{ $pick->lmp2->name }}</td>
                            <td>#{{ $pick->gtepro->car_number }} {{ $pick->gtepro->name }}</td>
                            <td>#{{ $pick->gteam->car_number }} {{ $pick->gteam->name }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="/race/{{ $race->id }}/predictions" class="btn btn-primary">Show All</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection