@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header">Perk Register</div>

                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group mb-2">
                            <div>
                                @foreach($perks as $perk)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="perks[]"
                                               value="{{$perk->id}}"
                                               id="perk{{$perk->id}}">

                                        <label class="form-check-label" for="perk{{$perk->id}}">
                                            {{ $perk->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <select class="form-control" id="rank" name="rank">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
