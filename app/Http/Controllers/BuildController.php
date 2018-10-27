<?php

namespace App\Http\Controllers;

use App\Build;
use App\BuildPerk;
use App\Perk;
use App\UserBuild;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index()
    {
        return view('build.index', ['perkCounts' => Perk::with('buildPerks')->get()]);
    }

    public function create()
    {
        return view('build.create', ['perks' => Perk::all()]);
    }

    public function builds()
    {
        return view('build.builds', ['builds' => Build::with(['perks', 'users'])->get()]);
    }

    public function store(Request $request)
    {
        $query = Build::query();
        $perks = $request->get('perks');
        foreach ($perks as $perk) {
            $query->whereHas('perks', function ($query) use ($perk) {
                $query->where('perks.id', $perk);
            });
        }

        $build = $query->first();
        if (is_null($build)) {
            $build = new Build();
            $build->save();
            $build->perks()->sync($perks);
        }

        $userBuild = new UserBuild();
        $userBuild->rank = $request->get('rank');

        $build->users()->save($userBuild);

        return redirect('/');
    }
}
