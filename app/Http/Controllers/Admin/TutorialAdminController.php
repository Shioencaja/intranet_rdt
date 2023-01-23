<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use App\Rules\UrlYt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class TutorialAdminController extends Controller
{
   public $dirname = '/images/tutorials/';

    public function index(Request $request)
    {
            $filter = ["q" => $request->q];
            return Inertia::render('Admin/Tutorials/Index', [
                'filter' => $filter,
                'tutorials' => Tutorial::with(['line'])->FilterAdmin($filter)->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Admin/Tutorials/Create', [
            "lines" => DB::table("lines")->get(),
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
            'title' => ['required', 'max:100'],
            'embed' => ['required', 'url', new UrlYt()],
            // 'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
        ])->validate();

        try {
            $e = $this->validateUrlYT($request->embed);
            if ($e["status"]) {
                $tutorial = new Tutorial();
                $tutorial->title = $request->title;
                $tutorial->embed = $e["url"];
                $tutorial->url = $request->embed;
                $tutorial->user_id = \Auth::user()->id;
                $tutorial->line_id = $request->line;
                

                if ($request->hasFile('image')) {
                    if ($request->file('image')) {
                        $file = $request->file('image');
                        $path = $request->getSchemeAndHttpHost() . $this->dirname;
                        $nameOrigin = $file->getClientOriginalName();
                        $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                        $url = $path . $name;
                        $file->move(public_path() . $this->dirname, $name);
                        $tutorial->image_url = $url;
                    }
                }
                $tutorial->save();
                return Redirect::route('admin.tutorial');
            } else{
                Redirect::back()
                ->withErrors(['name'=>'la url no es válida'])
                ->withInput();
            }
        } catch (\Throwable $th) {
            
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
    }

    public function validateUrlYT($str)
    {
        if (strpos($str, 'v=') !== false) {
            $url = explode("v=", $str)[1];
            return ["url" => $url, "status" => true];
        } else {
            return ["url" => null, "status" => false];
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
    public function edit(Request $request ,Tutorial $tutorial)
    {
        return Inertia::render('Admin/Tutorials/Edit', [
            "tutorial"=>$tutorial,
            "lines" => DB::table("lines")->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial)
    {
      
        Validator::make($request->all(), [
            'title' => ['required', 'max:100'],
            'embed' => ['required', 'url', new UrlYt()],
        ])->validate();

        try {
            $e = $this->validateUrlYT($request->embed);
            if ($e["status"]) {
                $tutorial->title = $request->title;
                $tutorial->embed = $e["url"];
                $tutorial->url = $request->embed;
                $tutorial->user_id = \Auth::user()->id;
                $tutorial->line_id = $request->line;
                $tutorial->save();
                return Redirect::route('admin.tutorial');
            } else{
                Redirect::back()
                ->withErrors(['name'=>'la url no es válida'])
                ->withInput();
            }
        } catch (\Throwable $th) {
            
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
    public function destroy(Tutorial $tutorial)
    {
        try {
            $tutorial->delete();
            return Redirect::route('admin.tutorial');
           } catch (\Throwable $th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
           }
    }
}
