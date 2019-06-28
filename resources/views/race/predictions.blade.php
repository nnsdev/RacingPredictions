@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="card rounded-0 text-white bg-dark">
                <div class="card-header">
                    Predictions for {{ $race->name }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">DPi</th>
                                <th scope="col">LMP2</th>
                                <th scope="col">GTLM</th>
                                <th scope="col">GTD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><a href="/user/{{ $user->user_id }}">{{ $user->user->name }}</a></td>
                                <td>{{ $user->dpi->getInfo() }}</td>
                                <td>{{ $user->lmp2->getInfo() }}</td>
                                <td>{{ $user->gtlm->getInfo() }}</td>
                                <td>{{ $user->gtd->getInfo() }}</td>
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
