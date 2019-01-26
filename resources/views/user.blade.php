@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-2 px-5">
            <div class="card rounded-0 text-white bg-dark">
                <div class="card-body text-center">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                    @endif
                    <h4>{{ $user->name }}</h4>
                </div>
            </div>
        </div>
        @if($predictions)
        <div class="col-md-9 px-5">
            <h1>Picks</h1>
            <div class="accordion" id="predictions">
                @foreach($predictions as $prediction)
                <div class="card rounded-0 text-white bg-dark">
                    <div class="card-header" id="header_{{ str_slug($prediction->race->name) }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{ str_slug($prediction->race->name) }}" aria-expanded="false" aria-controls="collapseOne">
                            {{ $prediction->race->name }}
                            </button>
                        </h5>
                    </div>

                    <div id="{{ str_slug($prediction->race->name) }}" class="collapse" aria-labelledby="header_{{ str_slug($prediction->race->name) }}" data-parent="#predictions">
                        <div class="card-body">
                            @if($prediction->dpi)
                            <div class="row">
                                <div class="col-md-3">
                                    <h3><span class="badge badge-danger">DPi</span></h3>
                                    <h4>{{ $prediction->dpi->getInfo() }}</h4>
                                </div>
                                <div class="col-md-3">
                                    <h3><span class="badge badge-danger">LMP2</span></h3>
                                    <h4>{{ $prediction->lmp2->getInfo() }}</h4>
                                </div>
                                <div class="col-md-3">
                                    <h3><span class="badge badge-danger">GTLM</span></h3>
                                    <h4>{{ $prediction->gtlm->getInfo() }}</h4>
                                </div>
                                <div class="col-md-3">
                                    <h3><span class="badge badge-danger">GTD</span></h3>
                                    <h4>{{ $prediction->gtd->getInfo() }}</h4>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection