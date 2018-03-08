<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstimateRequest;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use App\Image;


class EstimateRequestsController extends Controller
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
        if(Voyager::can('browse_all_estimate_requests')) {
            $estimateRequests = EstimateRequest::orderBy('created_at', 'desc')->get();
        } elseif (Voyager::canOrFail('browse_estimate_requests')) {
            $estimateRequests = EstimateRequest::where('user_id', Auth::user()->id)->get();
        }
        return view('pages.estimate-requests.index')->withEstimateRequests($estimateRequests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Voyager::canOrFail('add_estimate_requests');
        return view('pages.estimate-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estimateRequest = EstimateRequest::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        foreach ($request->photos as $photo) {
            $filename = $photo->store('public');
            Image::create([
                'estimate_request_id' => $estimateRequest->id,
                'name' => $filename,
            ]);
        }
        return redirect()->route('estimate-requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estimateRequest = EstimateRequest::where('id', $id)->first();

        $estimates = [];
        if($estimateRequest->id == Auth::user()->id || Voyager::can('browse_admin')) {
            $estimates = $estimateRequest->estimates;
        }
        return view('pages.estimate-requests.show')->withEstimates($estimates)->withEstimateRequest($estimateRequest);
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
