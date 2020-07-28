<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProblemController extends Controller
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
        $data['problems'] = Problem::all();
        return view('pages.problems.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['laboratories'] = Laboratory::all();
        return view('pages.problems.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1024',
            'laboratory_id' => 'required',
            'status' => 'required|between:0,1'
        ]);

        $laboratory_id = (int) $request->laboratory_id;

        if($laboratory_id === 0) {
            return redirect()->route('problems.create')->withErrors('O campo Local é obrigatório');
        }

        if(!Laboratory::find($laboratory_id)->exists()) {
            return redirect()->route('problems.create')->withErrors('Local não encontrado');
        }

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['active'] = 1;

        Problem::create($data);

        return redirect()->route('problems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Problem $problem)
    {
        $data['problem'] = $problem;
        return view('pages.problems.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem)
    {
        $data['laboratories'] = Laboratory::all();
        $data['problem'] = $problem;
        return view('pages.problems.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:1024',
            'laboratory_id' => 'required',
            'status' => 'required|between:0,1'
        ]);

        $laboratory_id = (int) $request->laboratory_id;

        if($laboratory_id === 0) {
            return redirect()->route('problems.create')->withErrors('O campo Local é obrigatório');
        }

        if(!Laboratory::find($laboratory_id)->exists()) {
            return redirect()->route('problems.create')->withErrors('Local não encontrado');
        }

        $problem->title = $request->title;
        $problem->body = $request->body;
        $problem->laboratory_id = $request->laboratory_id;
        $problem->status = $request->status;

        $problem->save();

        return redirect()->route('problems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem)
    {
        //
    }
}
