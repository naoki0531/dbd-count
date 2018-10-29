@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>Perk Build Ranking</h2>

            <form method="get">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Perk Select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2" name="survivorPerks[]">
                        @foreach($survivorPerks as $survivorPerk)
                            <option value="{{$survivorPerk->id}}"
                                    @if(in_array($survivorPerk->id, request('survivorPerks') ?? []))
                                        selected
                                    @endif
                            >{{$survivorPerk->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2">search</button>
            </form>

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
@endsection
