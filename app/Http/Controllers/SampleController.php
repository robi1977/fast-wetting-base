<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $title="Wykaz wprowadzonych przez Ciebie prób";

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
        $sample->time_unit = $request->get('time_unit');
        $sample->save();

        return redirect()->route('sample.index')->with('success', 'Próbka dodana.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        return view('samples.edit', compact('sample'))->with('title', "Edycja próby:");
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
        $sample->time_unit = $request->get('time_unit');
        $sample->update();
        return redirect()->route('sample.index')->with('success', 'Próbka udanie zaktualizowana.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {
        $sample->delete();
        return redirect()->route('sample.index')->with('success', 'Próbka usunięta z bazy.');
    }

    public function search()
    {
        $alloys=[];
        $substrates=[];
        $temps=[];
        $test_times=[];

        $samples= Sample::get();
        foreach($samples as $sample){
            array_push($alloys, $sample->alloy);
            array_push($substrates, $sample->substrate);
            array_push($temps, $sample->temp);
            array_push($test_times, $sample->test_time);
        }
        $alloys=array_unique($alloys, SORT_STRING);
        $alloys=array_values($alloys);
        $substrates=array_unique($substrates, SORT_STRING);
        $substrates=array_values($substrates);
        $temps=array_unique($temps, SORT_STRING);
        $temps=array_values($temps);
        $test_times=array_unique($test_times, SORT_STRING);
        $test_times=array_values($test_times);
        return view('samples.search', compact('alloys', 'substrates', 'temps', 'test_times'));
    }

    public function search_result(Request $request)
    {

        $alloys="";
        $substrates="";
        $temps="";
        $test_times="";

        $query="select * from samples";
        if(isset($request->alloys)){
            if(is_array($request->alloys)){
                $alloys="alloy='".implode("' or alloy='",$request->alloys)."'";
            } else {
                $alloys="alloy='".$request->alloys."'";
            }
        }
        if(isset($request->substrates)){
            if(is_array($request->substrates)){
                $substrates="substrate='".implode("' or substrate='",$request->substrates)."'";
            } else {
                $substrates="substrate='".$request->substrates."'";
            }
        }
        if(isset($request->temps)){
            if(is_array($request->temps)){
                $temps="temp='".implode("' or temp='",$request->temps)."'";
            } else {
                $temps="temp='".$request->temps."'";
            }
        }
        if(isset($request->test_times)){
            if(is_array($request->test_times)){
                $test_times="test_time='".implode("' or test_time='",$request->test_times)."'";
            } else {
                $test_times="test_time='".$request->test_times."'";
            }
        }
        $whereForQuery=[];

        if($alloys!=""){array_push($whereForQuery, $alloys);}
        if($substrates!=""){array_push($whereForQuery, $substrates);}
        if($temps!=""){array_push($whereForQuery, $temps);}
        if($test_times!=""){array_push($whereForQuery, $test_times);}

        if($whereForQuery!=[]){
            $query=$query." where ".implode(" and ",$whereForQuery);
        }

        $samples=DB::select($query);
        return view('samples.index')->with('title', "Wyniki wyszukiwania")->with('samples',$samples);
    }
}
