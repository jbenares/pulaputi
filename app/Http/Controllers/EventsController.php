<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\GameCategory;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date("Y-m-d");
        $events = Events::where('king_id',auth()->user()->id)
                        ->where('date_start', '>', $today)
                        ->orwhere('date_start', '<=', $today)
                        ->where('date_end', '>=', $today)
                        ->get();
        return view('events.index', compact('events'));
    }

    public function finishedevents()
    {
        $today = date("Y-m-d");
        $events = Events::where('king_id',auth()->user()->id)
                        ->where('date_end', '<', $today)
                        ->get();
        return view('events.finishedevents', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game_category = GameCategory::all();
        return view('events.create',compact('game_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|max:255',
            'event_desc' => 'required',
            'event_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'start_date'=>'required',
            'end_date'=>'required',
            'initial_pot'=>'required|numeric|min:100',
            'slot_price'=>'required|numeric|min:50',
            'game_category'=>'required',
        ]);

        $imageName = time().'.'.$request->event_image->extension();  
        $request->event_image->move(public_path('images'), $imageName);
       // $image_path = $request->file('event_image')->store('images', 'public');

        $get_choice_no = GameCategory::where('id',$request->input('game_category'))->get();
        $choice_array = $get_choice_no[0]['choice_array'];
        $outcomes=0;
        if($choice_array =="" || empty($choice_array)){
            $outcomes = $get_choice_no[0]['no_of_outcomes'];
        }
        $choices = "";
            if($outcomes >0){
            for($x=1;$x<=$outcomes;$x++){
                $choices .= $request->input('choice_array_'.$x) .", ";
            }
        }
        $choices = substr($choices,0,-1);

        $game_cat = explode("_", $request->input('game_category'));
        $game_cat_id = $game_cat[0];
        $data = Events::create([
            'king_id'=>auth()->user()->id,
            'event_name'=>$request->input('event_name'),
            'event_description'=>$request->input('event_desc'),
            'date_start'=>$request->input('start_date'),
            'date_end'=>$request->input('end_date'),
            'event_image' => $imageName,
            'initial_pot'=>$request->input('initial_pot'),
            'slot_price'=>$request->input('slot_price'),
            'game_category_id'=>$game_cat_id,
            'choice_array'=>$choices
        ]);
        return redirect()->route('events.index')->with('status','Event Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::find($id);
        $game_category = GameCategory::all();
        return view('events.edit', compact('game_category', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $events)
    {
        $validated = $request->validate([
            'event_name' => 'required|max:255',
            'event_desc' => 'required',
            'event_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'start_date'=>'required',
            'end_date'=>'required',
            'initial_pot'=>'required|numeric|min:100',
            'slot_price'=>'required|numeric|min:50',
            'game_category'=>'required',
        ]);

        if(!empty($request->event_image)){
            $imageName = time().'.'.$request->event_image->extension();  
            $request->event_image->move(public_path('images'), $imageName);
        }

        $get_choice_no = GameCategory::where('id',$request->input('game_category'))->get();
        $choice_array = $get_choice_no[0]['choice_array'];
        $outcomes=0;
        if($choice_array =="" || empty($choice_array)){
            $outcomes = $get_choice_no[0]['no_of_outcomes'];
        }
        $choices = "";
            if($outcomes >0){
            for($x=1;$x<=$outcomes;$x++){
                $choices .= $request->input('choice_array_'.$x) .", ";
            }
        }
        $choices = substr($choices,0,-1);

        $game_cat = explode("_", $request->input('game_category'));
        $game_cat_id = $game_cat[0];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        //
    }
}
