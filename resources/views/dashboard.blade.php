@extends('layout.app')

@section('content')
<div class="container-lg py-5">
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
        <div class="col-md-4 px-5">
            @if(now()->lessThan(\Carbon\Carbon::parse("2018-06-16T13:00:00Z")))
            <div class="card">
                <div class="card-header">
                    Pick your Teams
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::pull('success') }}
                    </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="lmp1">LMP1</label>
                            <select name="lmp1" id="lmp1" class="form-control select2">
                                @foreach(\App\Car::where('class', 'lmp1')->orderBy('car_number', 'ASC')->get() as $car)
                                <option value="{{ $car->id }}" @if(Auth::user()->betOn($car)) selected @endif>
                                    #{{ $car->car_number }} {{ $car->name }} ({{ $car->car }})
                                    (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lmp2">LMP2</label>
                            <select name="lmp2" id="lmp2" class="form-control select2">
                                @foreach(\App\Car::where('class', 'lmp2')->orderBy('car_number', 'ASC')->get() as $car)
                                <option value="{{ $car->id }}" @if(Auth::user()->betOn($car)) selected @endif>
                                    #{{ $car->car_number }} {{ $car->name }} ({{ $car->car }})
                                    (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gtepro">GTE Pro</label>
                            <select name="gtepro" id="gtepro" class="form-control select2">
                                @foreach(\App\Car::where('class', 'gtepro')->orderBy('car_number', 'ASC')->get() as $car)
                                <option value="{{ $car->id }}" @if(Auth::user()->betOn($car)) selected @endif>
                                    #{{ $car->car_number }} {{ $car->name }} ({{ $car->car }})
                                    (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gteam">GTE Am</label>
                            <select name="gteam" id="gteam" class="form-control select2">
                                @foreach(\App\Car::where('class', 'gteam')->orderBy('car_number', 'ASC')->get() as $car)
                                <option value="{{ $car->id }}" @if(Auth::user()->betOn($car)) selected @endif>
                                    #{{ $car->car_number }} {{ $car->name }} ({{ $car->car }})
                                    (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Set bets">
                        </div>
                    </form>
                </div>
            </div>
            @endif
            <div class="card mt-2">
                <div class="card-header">Most favorite teams</div>
                <div class="card-body">
                    @if($most_picked['lmp1'])
                    <div class="row">
                        <div class="col-md-6">
                            <h3><span class="badge badge-danger">LMP1</span></h3>
                            <h4>#{{ $most_picked['lmp1']->car_number  }} {{ $most_picked['lmp1']->name }}</h4>
                        </div>
                        <div class="col-md-6">
                            <h3><span class="badge badge-danger">LMP2</span></h3>
                            <h4>#{{ $most_picked['lmp2']->car_number  }} {{ $most_picked['lmp2']->name }}</h4>
                        </div>
                        <div class="col-md-6 mt-4">
                            <h3><span class="badge badge-danger">GTE Pro</span></h3>
                            <h4>#{{ $most_picked['gtepro']->car_number  }} {{ $most_picked['gtepro']->name }}</h4>
                        </div>
                        <div class="col-md-6 mt-4">
                            <h3><span class="badge badge-danger">GTE Am</span></h3>
                            <h4>#{{ $most_picked['gteam']->car_number  }} {{ $most_picked['gteam']->name }}</h4>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8 px-5">
            <div class="card mt-2">
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
            @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-16T13:00:00Z")) && now()->lessThan(\Carbon\Carbon::parse("2018-06-17T13:30:00Z")))
            <div class="card mt-2">
                <div class="card-header">Live Data</div>
                <div class="card-body">
                    <standings></standings>
                </div>
            </div>
            @endif
            @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-16T13:00:00Z")))
            <div class="card mt-2">
                <div class="card-header">
                    Top 10
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Points</td>
                        </tr>
                        @foreach($leaderboard as $user)
                        <tr @if($user->id == Auth::user()->id) style="background-color: #d3d5d6;" @endif>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                            <td>{{ $user->points }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="/leaderboard" class="btn btn-primary">Full Leaderboard</a>
                </div>
            </div>
            @elseif(now()->lessThan(\Carbon\Carbon::parse("2018-06-16T13:00:00Z")))
            <div class="card mt-2">
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
                    <a href="/predictions" class="btn btn-primary">Show All</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection