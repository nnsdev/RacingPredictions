<div class="card mt-1">
    <div class="card-header">Most favorite teams</div>
    <div class="card-body">
        @if($most_picked['lmp1'])
        <div class="row">
            <div class="col-md-3">
                <h3><span class="badge badge-danger">LMP1</span></h3>
                <h4>#{{ $most_picked['lmp1']->car_number  }} {{ $most_picked['lmp1']->name }}</h4>
            </div>
            <div class="col-md-3">
                <h3><span class="badge badge-danger">LMP2</span></h3>
                <h4>#{{ $most_picked['lmp2']->car_number  }} {{ $most_picked['lmp2']->name }}</h4>
            </div>
            <div class="col-md-3">
                <h3><span class="badge badge-danger">GTE Pro</span></h3>
                <h4>#{{ $most_picked['gtepro']->car_number  }} {{ $most_picked['gtepro']->name }}</h4>
            </div>
            <div class="col-md-3">
                <h3><span class="badge badge-danger">GTE Am</span></h3>
                <h4>#{{ $most_picked['gteam']->car_number  }} {{ $most_picked['gteam']->name }}</h4>
            </div>
        </div>
        @endif
    </div>
</div>