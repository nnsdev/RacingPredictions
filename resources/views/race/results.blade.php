@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="card">
                <div class="card-header">
                    Results for {{ $race->name }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">LMP1 Correct</th>
                                <th scope="col">LMP2 Correct</th>
                                <th scope="col">GTE Pro Correct</th>
                                <th scope="col">GTE Am Correct</th>
                                <th scope="col">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->predictions()->where('race_id', $race->id)->count() > 0)
                            <tr class="bg-primary text-white">
                                <th scope="row">{{ $you }}</th>
                                <td>You</td>
                                @php $positions = \App\Models\Prediction::getFinishingPositions($race, Auth::user()); @endphp
                                <td>
                                    @if($positions["lmp1"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["lmp2"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["gtepro"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["gteam"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>{{ $positions['points'] }}</td>
                            </tr>
                            @endif
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ ($users->currentPage() -1) * 100 + ($loop->index + 1) }}</th>
                                <td><a href="/user/{{ $user->user->id }}">{{ $user->user->name }}</a></td>
                                @php $positions = \App\Models\Prediction::getFinishingPositions($race, $user->user); @endphp
                                <td>
                                    @if($positions["lmp1"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["lmp2"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["gtepro"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["gteam"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>{{ $positions['points'] }}</td>
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