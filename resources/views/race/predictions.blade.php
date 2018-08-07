@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="card">
                <div class="card-header">
                    Predictions for {{ $race->name }}
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
                            @foreach($users as $user)
                            <tr>
                                <td><a href="/user/{{ $user->user_id }}">{{ $user->user->name }}</a></td>
                                <td>#{{ $user->lmp1->car_number }} {{ $user->lmp1->name }}</td>
                                <td>#{{ $user->lmp2->car_number }} {{ $user->lmp2->name }}</td>
                                <td>#{{ $user->gtepro->car_number }} {{ $user->gtepro->name }}</td>
                                <td>#{{ $user->gteam->car_number }} {{ $user->gteam->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->links() !!}                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection