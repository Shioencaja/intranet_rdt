<?php

namespace App\Http\Controllers;

use App\Models\Look;
use App\Models\Course;
use App\Rules\UrlYt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class LookController extends Controller
{
  
    public function index(Request $request)
    {
            return Inertia::render('Dashboard/Looks/Index', [
                'looks' => Look::orderBy('created_at', 'desc')->paginate(100),
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Look  $look
     * @return \Illuminate\Http\Response
     */
    public function show(Look $look)
    {
        return Inertia::render('Dashboard/Looks/Detail', [
            "look"=>$look,
            "last"=>Look::latest()
            ->take(env('LOOK_LAST'))
            ->where("id","!=",$look->id)
            ->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Look  $look
     * @return \Illuminate\Http\Response
     */
    public function edit(Look $look)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLookRequest  $request
     * @param  \App\Models\Look  $look
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLookRequest $request, Look $look)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Look  $look
     * @return \Illuminate\Http\Response
     */
    public function destroy(Look $look)
    {
        //
    }
}
