<?php

namespace App\Http\Controllers;

use App\Models\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class MarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard/Marketings/Index', [
            
        ]);
    }
    public function digital($slug ='')
    {
        return Inertia::render('Dashboard/Marketings/Digital', [
            "coupons"=>Marketing::with(['files'])->where("alias_cate","=","cp")->get(),
            "redes"=>Marketing::with(['files'])->where("alias_cate","=","red")->get(),
            "videos"=>Marketing::with(['files'])->where("alias_cate","=","red-video")->get(),
            "cards"=>Marketing::with(['files'])->where("alias_cate","=","card")->get(),
            "posters"=>Marketing::with(['files'])->where("alias_cate","=","poster")->get(),
            "services"=>Marketing::with(['files'])->where("alias_cate","=","service")->get(),
            "slug"=>$slug,
        ]);
    }

    public function advertising($slug ='')
    {
        return Inertia::render('Dashboard/Marketings/Advertising', [
            "logos"=>Marketing::with(['files'])->where("alias_cate","=","logo")->get(),
            "logoOthers"=>Marketing::with(['files'])->where("alias_cate","=","other_logo")->get(),
            "models"=>Marketing::with(['files'])->where("alias_cate","=","model")->get(),
            "products"=>Marketing::with(['files'])->where("alias_cate","=","product")->get(),
            "videos"=>Marketing::with(['files'])->where("alias_cate","=","product-video")->get(),
            "advertising"=>Marketing::with(['files'])->where("alias_cate","=","advertising")->get(),
            "slug"=>$slug,
           
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
     * @param  \App\Http\Requests\StoreMarketingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarketingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function show(Marketing $marketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketing $marketing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarketingRequest  $request
     * @param  \App\Models\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarketingRequest $request, Marketing $marketing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marketing  $marketing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketing $marketing)
    {
        //
    }
}
