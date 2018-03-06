<?php

namespace App\Http\Controllers;

use App\EstimateRequest;
use Illuminate\Http\Request;
use App\Estimate;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

class EstimatesController extends Controller
{
    /**
     * EstimatesController constructor.
     */
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
        Voyager::canOrFail('browse_estimates');
        $estimates = Estimate::where('user_id', Auth::user()->id)->get();
        return view('pages.estimates.index')->withEstimates($estimates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estimateRequests = EstimateRequest::all();
        Voyager::canOrFail('add_estimates');
        return view('pages.estimates.create')->withEstimateRequests($estimateRequests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estimate = new Estimate;
        $estimate->user_id = Auth::user()->id;
        $estimate->description = $request->description;
        $estimate->hours = $request->hours;
        $estimate->estimate_request_id = $request->estimate_request_id;
        $estimate->save();
        return redirect()->route('estimates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
