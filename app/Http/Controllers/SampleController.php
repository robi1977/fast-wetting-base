<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples=Sample::orderBy('id', 'desc')->get();
        $title="Ostatnio wprowadzone próby";

        return view('samples.index')->with('samples',$samples)->with('title', $title);
    }
    public function list()
    {
        $samples=Sample::orderBy('sample_number', 'desc')->get();
        $title="Wykaz wszystkich próbek";

        return view('samples.index')->with('samples',$samples)->with('title', $title);
    }
    public function your_list()
    {
        $samples=Sample::where('user_id', auth()->id())->orderBy('sample_number', 'desc')->get();
        $title="Wykaz wszystkich próbek";

        return view('samples.index')->with('samples',$samples)->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samples.create')->with('title', 'Wprowadź dane kolejnej próby');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sample = new Sample();
        $sample->date = $request->get('date');
        $sample->media = $request->get('media');
        $sample->sample_number = $request->get('sample_number');
        $sample->equipment = $request->get('equipment');
        $sample->method = $request->get('method');
        $sample->project = $request->get('project');
        $sample->alloy = $request->get('alloy');
        $sample->substrate = $request->get('substrate');
        $sample->support = $request->get('support');
        $sample->test_time = $request->get('test_time');
        $sample->temp = $request->get('temp');
        $sample->remarks = $request->get('remarks');
        $sample->user_id = $request->user()->id;
        $sample->save();
        $samples=Sample::orderBy('sample_number', 'desc')->get();
        return redirect('sample');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample $sample)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {

    }
}
