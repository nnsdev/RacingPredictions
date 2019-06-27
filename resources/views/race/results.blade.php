@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="card rounded-0 text-white bg-dark">
                <div class="card-header">
                    Results for {{ $race->name }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">DPi Correct</th>
                                @if($race->id != 3)
                                <th scope="col">LMP2 Correct</th>
                                <th scope="col">GTLM Correct</th>
                                @endif
                                <th scope="col">GTD Correct</th>
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
                                    @if($positions["dpi"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["dpi"] }})</small>
                                    @endif
                                </td>
                                @if($race->id != 3)
                                <td>
                                    @if($positions["lmp2"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["lmp2"] }})</small>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["gtlm"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["gtlm"] }})</small>
                                    @endif
                                </td>
                                @endif
                                <td>
                                    @if($positions["gtd"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["gtd"] }})</small>
                                    @endif
                                </td>
                                <td>{{ $positions['points'] }}</td>
                            </tr>
                            @endif
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ ($users->currentPage() -1) * 50 + ($loop->index + 1) }}</th>
                                <td><a href="/user/{{ $user->user->id }}">{{ $user->user->name }}</a></td>
                                @php $positions = \App\Models\Prediction::getFinishingPositions($race, $user->user); @endphp
                                <td>
                                    @if($positions["dpi"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["dpi"] }})</small>
                                    @endif
                                </td>
                                @if($race->id != 3)
                                <td>
                                    @if($positions["lmp2"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["lmp2"] }})</small>
                                    @endif
                                </td>
                                <td>
                                    @if($positions["gtlm"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["gtlm"] }})</small>
                                    @endif
                                </td>
                                @endif
                                <td>
                                    @if($positions["gtd"] == 1)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                        <small>({{ $positions["gtd"] }})</small>
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