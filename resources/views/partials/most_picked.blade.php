<div class="card rounded-0 text-white bg-dark mt-1">
    <div class="card-header">Most favorite teams</div>
    <div class="card-body">
        @if($most_picked['dpi'])
        <div class="row">
            <div class="col-md-3">
                <h3><span class="badge badge-danger">DPi</span></h3>
                <h4>#{{ $most_picked['dpi']->car_number  }} {{ $most_picked['dpi']->name }}</h4>
            </div>
            <div class="col-md-3">
                <h3><span class="badge badge-danger">LMP2</span></h3>
                <h4>#{{ $most_picked['lmp2']->car_number  }} {{ $most_picked['lmp2']->name }}</h4>
            </div>
            <div class="col-md-3">
                <h3><span class="badge badge-danger">GTLM</span></h3>
                <h4>#{{ $most_picked['gtlm']->car_number  }} {{ $most_picked['gtlm']->name }}</h4>
            </div>
            <div class="col-md-3">
                <h3><span class="badge badge-danger">GTD</span></h3>
                <h4>#{{ $most_picked['gtd']->car_number  }} {{ $most_picked['gtd']->name }}</h4>
            </div>
        </div>
        @endif
    </div>
</div>