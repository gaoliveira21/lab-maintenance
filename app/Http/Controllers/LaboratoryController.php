<?php

namespace App\Http\Controllers;

use App\Models\Equipments;
use Illuminate\Http\Request;
use App\Models\Laboratory;

class LaboratoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Laboratory::class);
        $data['laboratories'] = Laboratory::where('active', 1)->get();
        return view('pages.labs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Laboratory::class);
        return view('pages.labs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Laboratory::class);
        $request->validate([
            'name' => 'required',
            'computers' => 'required',
            'projectors' => 'required',
            'televisions' => 'required'
        ]);

        $name = $request->name;
        $laboratory = Laboratory::where([
            'name' => $name,
            'active' => 1
        ])->first();

        if (!empty($laboratory)) {
            return redirect()->route('labs.create')->withErrors('Laboratório ja cadastrado.');
        }

        $newLaboratory = Laboratory::create([
            'name' => $name,
            'active' => 1
        ]);

        Equipments::create([
            'computers' => $request->computers,
            'projectors' => $request->projectors,
            'televisions' => $request->televisions,
            'laboratory_id' => $newLaboratory->id
        ]);

        return redirect()->route('labs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Laboratory::class);
        $data['laboratory'] = Laboratory::find($id);

        if (empty($data['laboratory'])) {
            return redirect()->route('labs.index');
        }

        return view('pages.labs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->authorize('update', Laboratory::class);
        $request->validate([
            'name' => 'required',
        ]);

        $name = $request->name;
        $laboratory = Laboratory::where([
            'name' => $name,
            'active' => 1
        ])->first();

        if (!empty($laboratory) && $laboratory->name !== $request->name) {
            return redirect('labs/' . $id . '/edit')->withErrors('Laboratório ja cadastrado.');
        }

        $laboratory = Laboratory::find($id);
        $laboratory->name = $name;

        $equipments = Equipments::where('laboratory_id', $laboratory->id)->first();
        $equipments->computers = $request->computers;
        $equipments->projectors = $request->projectors;
        $equipments->televisions = $request->televisions;

        $laboratory->save();
        $equipments->save();

        return redirect()->route('labs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Laboratory::class);
        $laboratory = Laboratory::find($id);

        if (empty($laboratory)) {
            return response()->json(['error' => 'Laboratory not found'], 404);
        }

        $laboratory->active = 0;
        $laboratory->save();

        return response()->json([], 200);
    }
}
