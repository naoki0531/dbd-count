@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Perk Build Ranking</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Count</th>
                        <th>Perk 1</th>
                        <th>Perk 2</th>
                        <th>Perk 3</th>
                        <th>Perk 4</th>
                        <th>User Rank</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($builds as $build)
                            <tr>
                                <td>{{ $build->users->count() }}</td>
                                @foreach($build->perks as $perk)
                                    <td>{{ $perk->name }}</td>
                                @endforeach
                                <td>
                                @foreach($build->users as $user)
                                    @if (!$loop->first),@endif
                                    {{ $user->rank }}
                                @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
