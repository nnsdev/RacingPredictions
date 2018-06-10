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
        <div class="col-md-6 px-5">
            <div class="card">
                <div class="card-header">
                    Pick your Teams
                </div>
                <div class="card-body">
                    @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-15T13:00:00Z")))
                    <div class="alert alert-info">
                        Bets are now closed! Have fun watching the 24!
                    </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::pull('success') }}
                    </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="lmp1">LMP1</label>
                            <select name="lmp1" id="lmp1" class="form-control select2" @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-15T13:00:00Z"))) disabled @endif>
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
                            <select name="lmp2" id="lmp2" class="form-control select2" @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-15T13:00:00Z"))) disabled @endif>
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
                            <select name="gtepro" id="gtepro" class="form-control select2" @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-15T13:00:00Z"))) disabled @endif>
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
                            <select name="gteam" id="gteam" class="form-control select2" @if(now()->greaterThan(\Carbon\Carbon::parse("2018-06-15T13:00:00Z"))) disabled @endif>
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
        </div>
        <div class="col-md-6 px-5">
            <div class="card">
                <div class="card-header">
                    Top 10
                </div>
                <div class="card-body">
                    Top 10 and the full leaderboard will be shown after the race.
                </div>
            </div>
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
        </div>
    </div>
</div>
@endsection