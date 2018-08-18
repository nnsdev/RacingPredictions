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
        <strong>Vote closes: </strong> {{ $race->race_start }} GMT
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="lmp1">LMP1</label>
                <select name="lmp1" id="lmp1" class="form-control select2">
                    @foreach($race->cars()->where('class', 'lmp1')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'lmp1') == $car->id) ? 'selected' : '' }}>
                        {{ $car->getInfo() }} ({{ $car->car }})
                        (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="lmp2">LMP2</label>
                <select name="lmp2" id="lmp2" class="form-control select2">
                    @foreach($race->cars()->where('class', 'lmp2')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'lmp2') == $car->id) ? 'selected' : '' }}>
                        {{ $car->getInfo() }} ({{ $car->car }})
                        (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gtepro">GTE Pro</label>
                <select name="gtepro" id="gtepro" class="form-control select2">
                    @foreach($race->cars()->where('class', 'gtepro')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'gtepro') == $car->id) ? 'selected' : '' }}>
                        {{ $car->getInfo() }} ({{ $car->car }})
                        (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gteam">GTE Am</label>
                <select name="gteam" id="gteam" class="form-control select2">
                    @foreach($race->cars()->where('class', 'gteam')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'gteam') == $car->id) ? 'selected' : '' }}>
                        {{ $car->getInfo() }} ({{ $car->car }})
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