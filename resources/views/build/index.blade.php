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
                            <td><img src="/storage/image/">{{ $perkCount->count }}</td>
                            <td>{{ $perkCount->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
