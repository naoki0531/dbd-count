@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Perk Ranking</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Count</th>
                        <th>Perk</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($perkCounts as $perkCount)
                        <tr>
                            <td style="vertical-align: middle">{{ $perkCount->count }}</td>
                            <td style="vertical-align: middle"><img style="width: 40px;padding-right: 10px" src="/image/{{$perkCount->id}}.png">{{ $perkCount->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
