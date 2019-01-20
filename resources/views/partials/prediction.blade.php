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
                <label for="dpi">DPi</label>
                <select name="dpi" id="dpi" class="form-control select2">
                    @foreach($race->cars()->where('class', 'dpi')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'dpi') == $car->id) ? 'selected' : '' }}>
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
                <label for="gtlm">GTLM</label>
                <select name="gtlm" id="gtlm" class="form-control select2">
                    @foreach($race->cars()->where('class', 'gtlm')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'gtlm') == $car->id) ? 'selected' : '' }}>
                        {{ $car->getInfo() }} ({{ $car->car }})
                        (@foreach(json_decode($car->drivers) as $driver){{ $driver}}{{ (!$loop->last) ? ', ' : '' }}@endforeach)
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gtd">GTD</label>
                <select name="gtd" id="gtd" class="form-control select2">
                    @foreach($race->cars()->where('class', 'gtd')->orderBy('car_number', 'ASC')->get() as $car)
                    <option value="{{ $car->id }}" {{ (Auth::user()->getPrediction($race, 'gtd') == $car->id) ? 'selected' : '' }}>
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
        <a href="#" data-toggle="modal" data-target="#distribution">Point Distribution</a>
    </div>
</div>

<div class="modal fade" id="distribution" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Point Distribution</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>DPi, GTLM, GTD</th>
                    <th>LMP2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>100</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>80</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>60</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>40</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Other</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>