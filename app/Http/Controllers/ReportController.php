<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['reports'] = Report::where(['active' => 1])->get();
        return view('pages.reports.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['laboratories'] = Laboratory::all();
        return view('pages.reports.create', $data);
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
            'text' => 'required|max:1024',
        ]);

        $labs = $request->labs;

        if(empty($labs)){
            return redirect()->route('reports.create')->withErrors('É obrigatório selecionar ao menos um laboratório');
        }

        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['user_id'] = Auth::id();
        $data['active'] = 1;

        $report = Report::create($data);
        $report->labs()->attach($labs);

        return redirect()->route('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $data['report'] = $report;
        return view('pages.reports.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $data['laboratories'] = Laboratory::all();
        $data['report'] = $report;
        return view('pages.reports.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title' => 'required|max:255',
            'text' => 'required|max:1024',
        ]);

        $labs = $request->labs;

        if(empty($labs)){
            return redirect()->route('reports.update')->withErrors('É obrigatório selecionar ao menos um laboratório');
        }

        $report->title = $request->title;
        $report->text = $request->text;

        $report->save();
        $report->labs()->sync($labs);

        return redirect()->route('reports.index');
    }
}
