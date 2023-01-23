<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Rules\UrlYt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CourseAdminController extends Controller
{
    public $dirname = '/images/courses/';
    public function index(Request $request)
    {
            $filter = ["q" => $request->q];
            return Inertia::render('Admin/Courses/Index', [
                'filter' => $filter,
                'courses' => Course::with(['category'])->FilterAdmin($filter)->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Courses/Create', [
            "categories" => DB::table("categories")->get(),
            "size_file" => env("SIZE_FILE"),
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
            'date' => ['required', 'date'],
            'embed' => ['required', 'url', new UrlYt()],
            'description' => ['required', 'max:245'],
            'category' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
            'files.*' => 'nullable|mimes:jpeg,jpg,png,pdf|max:' . env('SIZE_FILE'),
        ])->validate();

        try {

            $e = $this->validateUrlYT($request->embed);
            if ($e["status"]) {
                $courses = new Course();
                $courses->title = $request->title;
                $courses->date = $request->date;
                $courses->description = $request->description;
                $courses->embed = $e["url"];
                $courses->url = $request->embed;
                $courses->category_id = $request->category;
                $courses->user_id = \Auth::user()->id;

                if ($request->hasFile('image')) {
                    if ($request->file('image')) {
                        $file = $request->file('image');
                        $path = $request->getSchemeAndHttpHost() . $this->dirname;
                        $nameOrigin = $file->getClientOriginalName();
                        $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                        $url = $path . $name;
                        $file->move(public_path() . $this->dirname, $name);
                        $courses->avatar_url = $url;
                    }
                }
                $courses->user_id = \Auth::user()->id;
                $courses->save();

                //files
                if ($request->hasFile('files')) {
                    $data = [];
                    foreach ($request->file('files') as $file) {
                        $nameOrigin = $file->getClientOriginalName();
                        $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path() . $this->dirname, $name);
                        $url = env('APP_URL') . $this->dirname . $name;
                        array_push($data, ["course_id" => $courses->id, "origin_name" => strtolower(strtr($nameOrigin, " ", "_")), "name" => $name, "type" => $file->getClientOriginalExtension(), "url_patch" => $url]);
                    }
                    DB::table("course_files")->insert($data);
                }

                return Redirect::route('admin.course');
            } else {
                Redirect::back()
                ->withErrors(["message"=>"la url no es válida"])
                ->withInput();
            }

        } catch (\Throwable$th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
        }
    }


    public function update(Request $request ,Course $course)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'date' => ['required', 'date'],
            'embed' => ['required', 'url', new UrlYt()],
            'description' => ['required', 'max:245'],
            'category' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
            'files.*' => 'nullable|mimes:jpeg,jpg,png,pdf|max:' . env('SIZE_FILE'),
        ])->validate();

        try {

            $e = $this->validateUrlYT($request->embed);
            if ($e["status"]) {
                $course->title = $request->title;
                $course->date = $request->date;
                $course->description = $request->description;
                $course->embed = $e["url"];
                $course->url = $request->embed;
                $course->category_id = $request->category;
                $course->user_id = \Auth::user()->id;

                if ($request->hasFile('image')) {
                    if ($request->file('image')) {
                        $file = $request->file('image');
                        $path = $request->getSchemeAndHttpHost() . $this->dirname;
                        $nameOrigin = $file->getClientOriginalName();
                        $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                        $url = $path . $name;
                        $file->move(public_path() . $this->dirname, $name);
                        $course->avatar_url = $url;
                    }
                }
                $course->user_id = \Auth::user()->id;
                $course->save();

                //files
                if ($request->hasFile('files')) {
                    $data = [];
                    foreach ($request->file('files') as $file) {
                        $nameOrigin = $file->getClientOriginalName();
                        $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path() . $this->dirname, $name);
                        $url = env('APP_URL') . $this->dirname . $name;
                        array_push($data, ["course_id" => $course->id, "origin_name" => strtolower(strtr($nameOrigin, " ", "_")), "name" => $name, "type" => $file->getClientOriginalExtension(), "url_patch" => $url]);
                    }
                    DB::table("course_files")->insert($data);
                }

                return Redirect::route('admin.course');
            } else {
                Redirect::back()
                ->withErrors(["message"=>"la url no es válida"])
                ->withInput();
            }

        } catch (\Throwable$th) {
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
    public function edit(Course $course)
    {
        return Inertia::render('Admin/Courses/Edit', [
            "course"=>$course,
            "files"=>DB::table("course_files")->where("course_id","=",$course->id)->get(),
            "categories" => DB::table("categories")->get(),
            "size_file" => env("SIZE_FILE"),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return Redirect::route('admin.course');
           } catch (\Throwable $th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
           }
    }

    public function destroyFile($id)
    {
        try {
            DB::table("course_files")->where("id", "=", $id)->delete();
            return response()->json(["status" => true]);
        } catch (\Throwable$th) {
            return response()->json(["status" => false, "err" => json_encode($th->getMessage())]);
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
}
