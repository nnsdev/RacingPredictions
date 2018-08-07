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
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->predictions()->count() > 0)
                            <tr style="background-color: #d3d5d6">
                                <th scope="row">{{ $you }}</th>
                                <td>You</td>
                                <td>{{ (Auth::user()->predictions()->count() > 0) ? Auth::user()->points : 0 }}</td>
                            </tr>
                            @endif
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ ($users->currentPage() -1) * 100 + ($loop->index + 1) }}</th>
                                <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>{{ ($user->predictions()->count() > 0) ? $user->points : 0 }}</td>
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