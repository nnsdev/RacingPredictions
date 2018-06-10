@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-2 px-5">
            <div class="card">
                <div class="card-body text-center">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                    @endif
                    <h4>{{ $user->name }}</h4>
                </div>
            </div>
        </div>
        @if($user->prediction)
        <div class="col-md-9 px-5">
            <h1>Picks</h1>
            <div class="card">
                <div class="card-header">LMP1</div>
                <div class="card-body">
                    @php $lmp1 = \App\Car::findOrFail($user->prediction->lmp1_id); @endphp
                    <h3>#{{ $lmp1->car_number }} {{ $lmp1->name }}</h3>
                    <h3 class="small">{{ $lmp1->car }} &middot; Driven by @foreach(json_decode($lmp1->drivers) as $driver) {{ $driver }}{{ (!$loop->last) ? ',' : '' }} @endforeach</h3>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">LMP2</div>
                <div class="card-body">
                    @php $lmp2 = \App\Car::findOrFail($user->prediction->lmp2_id); @endphp
                    <h3>#{{ $lmp2->car_number }} {{ $lmp2->name }}</h3>
                    <h3 class="small">{{ $lmp2->car }} &middot; Driven by @foreach(json_decode($lmp2->drivers) as $driver) {{ $driver }}{{ (!$loop->last) ? ',' : '' }} @endforeach</h3>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">GTE Pro</div>
                <div class="card-body">
                    @php $gtepro = \App\Car::findOrFail($user->prediction->gtepro_id); @endphp
                    <h3>#{{ $gtepro->car_number }} {{ $gtepro->name }}</h3>
                    <h3 class="small">{{ $gtepro->car }} &middot; Driven by @foreach(json_decode($gtepro->drivers) as $driver) {{ $driver }}{{ (!$loop->last) ? ',' : '' }} @endforeach</h3>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">GTE Am</div>
                <div class="card-body">
                    @php $gteam = \App\Car::findOrFail($user->prediction->gteam_id); @endphp
                    <h3>#{{ $gteam->car_number }} {{ $gteam->name }}</h3>
                    <h3 class="small">{{ $gteam->car }} &middot; Driven by @foreach(json_decode($gteam->drivers) as $driver) {{ $driver }}{{ (!$loop->last) ? ',' : '' }} @endforeach</h3>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection