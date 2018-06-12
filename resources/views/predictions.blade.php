@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="card">
                <div class="card-header">
                    Leaderboard
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">LMP1</th>
                                <th scope="col">LMP2</th>
                                <th scope="col">GTE Pro</th>
                                <th scope="col">GTE Am</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($predictions as $prediction)
                            <tr>
                                <td><a href="/user/{{ $prediction->user_id }}">{{ $prediction->user->name }}</a></td>
                                <td>#{{ $prediction->lmp1->car_number }} {{ $prediction->lmp1->name }}</td>
                                <td>#{{ $prediction->lmp2->car_number }} {{ $prediction->lmp2->name }}</td>
                                <td>#{{ $prediction->gtepro->car_number }} {{ $prediction->gtepro->name }}</td>
                                <td>#{{ $prediction->gteam->car_number }} {{ $prediction->gteam->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $predictions->links() !!}                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection