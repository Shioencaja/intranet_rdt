<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Look;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class LookAdminController extends Controller
{
    public $dirname = '/images/looks/';
    public function index(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/Looks/Index', [
            'filter' => $filter,
            'looks' => Look::FilterAdmin($filter)->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Looks/Create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
        ])->validate();

        try {
            $look = new Look();
            $look->title = $request->title;
            $look->description = $request->description;
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $look->image_url = $url;
                }
            }
            $look->user_id = \Auth::user()->id;
            $look->save();
            return Redirect::route('admin.look');

        } catch (\Throwable$th) {
             return Redirect::route('admin.look');
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
    public function edit(Look $look)
    {
        return Inertia::render('Admin/Looks/Edit', [
            "look"=>$look
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Look $look)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
        ])->validate();

        try {
           
            $look->title = $request->title;
            $look->description = $request->description;
            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $look->image_url = $url;
                }
            }
            $look->user_id = \Auth::user()->id;
            $look->save();
            return Redirect::route('admin.look');
        } catch (\Throwable$th) {
             return Redirect::route('admin.look');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Look $look)
    {
        try {
            $look->delete();
            return Redirect::route('admin.look');
           } catch (\Throwable $th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
           }
    }
}
