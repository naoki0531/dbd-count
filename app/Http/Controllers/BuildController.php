<?php

namespace App\Http\Controllers;

use App\Build;
use App\BuildPerk;
use App\Perk;
use App\UserBuild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuildController extends Controller
{
    public function index()
    {
        $perkCounts = DB::table('perks as p')
            ->selectRaw('p.id, p.name, count(bp.perk_id) as count')
            ->join('build_perks as bp', 'p.id', '=', 'bp.perk_id')
            ->groupBy('p.id', 'p.name')
            ->orderByRaw('count(bp.perk_id) DESC')->get();

        return view('build.index', ['perkCounts' => $perkCounts]);
    }

    public function create()
    {
        return view('build.create', ['perks' => Perk::all()]);
    }

    public function builds(Request $request)
    {
        $query = Build::with(['perks', 'users']);
        $requestSurvivorPerks = $request->get('survivorPerks');
        if (!is_null($requestSurvivorPerks)) {
            foreach ($requestSurvivorPerks as $survivorPerk) {
                $query->whereHas('perks', function ($query) use ($survivorPerk) {
                    $query->where('id', $survivorPerk);
                });
            }
        }

        return view('build.builds', ['builds' => $query->get(), 'survivorPerks' => Perk::all()]);
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
