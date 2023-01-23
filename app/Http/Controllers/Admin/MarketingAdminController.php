<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class MarketingAdminController extends Controller
{
    public $dirname = '/images/marketings/';
    public $dirname_v = '/videos/marketings/';

    /*****************************************start coupons****************************************/
    public function coupons(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HDigitals/Coupons/Index', [
            'filter' => $filter,
            'coupons' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'cp')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }

    public function couponsCreate()
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Coupons/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }

    public function couponsEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Coupons/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }

    /*****************************************end coupons****************************************/

    /*****************************************start rds****************************************/
    public function redes(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HDigitals/Rds/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'red')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function redCreate()
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Rds/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function redEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Rds/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end rds****************************************/

    /*****************************************start rds-video****************************************/
    public function redesVideo(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HDigitals/RdsVideos/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'red-video')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function redVideoCreate()
    {
        return Inertia::render('Admin/HMarketings/HDigitals/RdsVideos/Create', [
            "size_file" => env("SIZE_VIDEO"),
        ]);
    }
    public function redVideoEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HDigitals/RdsVideos/Edit', [
            "size_file" => env("SIZE_VIDEO"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end rds-video****************************************/

    /*****************************************start cards****************************************/
    public function cards(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HDigitals/Cards/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'card')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function cardCreate()
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Cards/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function cardEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Cards/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end cards****************************************/

    /*****************************************start posters****************************************/
    public function posters(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HDigitals/Posters/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'poster')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function posterCreate()
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Posters/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function posterEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Posters/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end posters****************************************/

    /*****************************************start services****************************************/
    public function services(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HDigitals/Services/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'service')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function serviceCreate()
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Services/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function serviceEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HDigitals/Services/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end services****************************************/

    /*****************************************start logos****************************************/
    public function logos(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HAdvertising/Logos/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'logo')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function logoCreate()
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/Logos/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function logoEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/Logos/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end logos****************************************/

    /*****************************************start logos****************************************/
    public function othersLogos(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HAdvertising/LogosOthers/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'other_logo')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function otherLogoCreate()
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/LogosOthers/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function otherLogoEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/LogosOthers/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end logos****************************************/

    /*****************************************start models****************************************/
    public function models(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HAdvertising/Models/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'model')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function modelCreate()
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/Models/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function modelEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/Models/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end models****************************************/

    /*****************************************start products****************************************/
    public function products(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HAdvertising/Products/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'product')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function productCreate()
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/Products/Create', [
            "size_file" => env("SIZE_FILE"),
        ]);
    }
    public function productEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/Products/Edit', [
            "size_file" => env("SIZE_FILE"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end products****************************************/


    /*****************************************start product-videos****************************************/
    public function productsV(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/HMarketings/HAdvertising/ProductVideos/Index', [
            'filter' => $filter,
            'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'product-video')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    public function productVCreate()
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/ProductVideos/Create', [
            "size_file" => env("SIZE_VIDEO"),
        ]);
    }
    public function productVEdit(Marketing $marketing)
    {
        return Inertia::render('Admin/HMarketings/HAdvertising/ProductVideos/Edit', [
            "size_file" => env("SIZE_VIDEO"),
            "marketing" => $marketing,
            "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
        ]);
    }
    /*****************************************end product-videos****************************************/


 /*****************************************start advertising****************************************/
 public function advertising(Request $request)
 {
     $filter = ["q" => $request->q];
     return Inertia::render('Admin/HMarketings/HAdvertising/Advertising/Index', [
         'filter' => $filter,
         'marketings' => Marketing::FilterAdmin($filter)->where('alias_cate', "=", 'advertising')->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
     ]);
 }
 public function advertisingCreate()
 {
     return Inertia::render('Admin/HMarketings/HAdvertising/Advertising/Create', [
         "size_file" => env("SIZE_VIDEO"),
     ]);
 }
 public function advertisingEdit(Marketing $marketing)
 {
     return Inertia::render('Admin/HMarketings/HAdvertising/Advertising/Edit', [
         "size_file" => env("SIZE_VIDEO"),
         "marketing" => $marketing,
         "files" => DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->get(),
     ]);
 }

 
 /*****************************************end advertising****************************************/

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'description' => ['nullable', 'max:245'],
            'alias' => ['required', 'max:10'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
            'files.*' => 'nullable|mimes:jpeg,jpg,png,pdf|max:' . env('SIZE_FILE'),
        ])->validate();

        try {

            $marketing = new Marketing();
            $marketing->title = $request->title;
            $marketing->alias_cate = $request->alias;
            $marketing->description = $request->description;
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $marketing->image_url = $url;
                }
            }
            $marketing->user_id = \Auth::user()->id;
            $marketing->save();

            //files
            if ($request->hasFile('files')) {
                $data = [];
                foreach ($request->file('files') as $file) {
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $this->dirname, $name);
                    $url = env('APP_URL') . $this->dirname . $name;
                    array_push($data, ["marketing_id" => $marketing->id, "origin_name" => strtolower(strtr($nameOrigin, " ", "_")), "name" => $name, "type" => $file->getClientOriginalExtension(), "url_patch" => $url]);
                }
                DB::table("marketing_files")->insert($data);
            }

            return Redirect::route($request->route);
        } catch (\Throwable$th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
    }

    public function storeWithVideo(Request $request)
    {
        //ability init php
      
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'alias' => ['required', 'max:15'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
            'files.*' => ['required', 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,application/octet-stream,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi', 'max:' . env('SIZE_VIDEO')],
        ])->validate();

        try {
            \Log::debug("----");
            $marketing = new Marketing();
            $marketing->title = $request->title;
            $marketing->alias_cate = $request->alias;
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $marketing->image_url = $url;
                }
            }
            $marketing->user_id = \Auth::user()->id;
            $marketing->save();

            //files
            if ($request->hasFile('files')) {
                $data = [];
                foreach ($request->file('files') as $file) {

                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $this->dirname_v, $name);
                     $url = env('APP_URL') . $this->dirname_v . $name;
                     array_push($data, ["marketing_id" => $marketing->id, "origin_name" => strtolower(strtr($nameOrigin, " ", "_")), "name" => $name, "type" => $file->getClientOriginalExtension(), "url_patch" => $url]);

                }
                DB::table("marketing_files")->insert($data);
            }

            return Redirect::route($request->route);
        } catch (\Throwable$th) {
            \Log::debug($th);
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
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
    public function update(Request $request, Marketing $marketing)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'description' => ['nullable', 'max:245'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
            'files.*' => 'nullable|mimes:jpeg,jpg,png,pdf|max:' . env('SIZE_FILE'),
        ])->validate();

        try {
            $marketing->title = $request->title;
            $marketing->description = $request->description;
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $marketing->image_url = $url;
                }
            }
            $marketing->user_id = \Auth::user()->id;
            $marketing->save();

            //files
            if ($request->hasFile('files')) {
                $data = [];
                foreach ($request->file('files') as $file) {
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $this->dirname, $name);
                    $url = env('APP_URL') . $this->dirname . $name;
                    array_push($data, ["marketing_id" => $marketing->id, "origin_name" => strtolower(strtr($nameOrigin, " ", "_")), "name" => $name, "type" => $file->getClientOriginalExtension(), "url_patch" => $url]);
                }
                DB::table("marketing_files")->insert($data);
            }

            return Redirect::route($request->route);
        } catch (\Throwable$th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
    }

    public function updateWithVideo(Request $request, Marketing $marketing)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'description' => ['nullable', 'max:245'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
            'files.*' => ['nullable', 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,application/octet-stream,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi', 'max:' . env('SIZE_VIDEO')],
        ])->validate();

        try {
            $marketing->title = $request->title;
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $marketing->image_url = $url;
                }
            }
            $marketing->user_id = \Auth::user()->id;
            $marketing->save();

            //files
            if ($request->hasFile('files')) {
                $data = [];
                foreach ($request->file('files') as $file) {
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . $this->dirname_v, $name);
                    $url = env('APP_URL') . $this->dirname_v . $name;
                    array_push($data, ["marketing_id" => $marketing->id, "origin_name" => strtolower(strtr($nameOrigin, " ", "_")), "name" => $name, "type" => $file->getClientOriginalExtension(), "url_patch" => $url]);
                }
                DB::table("marketing_files")->insert($data);
            }

            return Redirect::route($request->route);
        } catch (\Throwable$th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketing $marketing)
    {
        try {
            $marketing->delete();
            DB::table("marketing_files")->where("marketing_id", "=", $marketing->id)->delete();
            Redirect::back();
        } catch (\Throwable$th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
    }

    //delete file by id
    public function destroyFileById($id)
    {
        try {
            DB::table("marketing_files")->where("id", "=", $id)->delete();
            return response()->json(["status" => true]);
        } catch (\Throwable$th) {
            return response()->json(["status" => false, "err" => json_encode($th->getMessage())]);
        }
    }
}
