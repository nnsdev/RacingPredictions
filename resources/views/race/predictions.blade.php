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
                                <td>{{ $user->lmp1->getInfo() }}</td>
                                <td>{{ $user->lmp2->getInfo() }}</td>
                                <td>{{ $user->gtepro->getInfo() }}</td>
                                <td>{{ $user->gteam->getInfo() }}</td>
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