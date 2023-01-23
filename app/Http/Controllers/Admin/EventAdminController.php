<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EventAdminController extends Controller
{

    public $dirname = '/images/events/';
    public function index(Request $request)
    {
        $filter = ["q" => $request->q];
        return Inertia::render('Admin/Events/Index', [
            'filter' => $filter,
            'events' => Event::FilterAdmin($filter)->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Admin/Events/Create', [
        ]);
    }
   

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'date' => ['required', 'max:100'],
            'hour' => ['required', 'max:100'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
        ])->validate();

        try {
            $event = new Event();
            $event->title = $request->title;
            $event->date = $request->date;
            $event->hour = $request->hour;
            $event->description = $request->description;
            $event->title = $request->title;

            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $event->image_url = $url;
                }
            }
            $event->user_id = \Auth::user()->id;
            $event->save();
            return Redirect::route('admin.event');

        } catch (\Throwable$th) {
             return Redirect::route('admin.event');
        }
    }

    public function edit(Event $event)
    {
        return Inertia::render('Admin/Events/Edit', [
            "event"=>$event
        ]);
    }

    public function update(Request $request, Event $event )
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'date' => ['required', 'max:100'],
            'hour' => ['required', 'max:100'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:' . env('SIZE_IMAGE')],
        ])->validate();
        try {
            
            $event->title = $request->title;
            $event->date = $request->date;
            $event->hour = $request->hour;
            $event->description = $request->description;
            $event->title = $request->title;

            if ($request->hasFile('image')) {
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = $request->getSchemeAndHttpHost() . $this->dirname;
                    $nameOrigin = $file->getClientOriginalName();
                    $name = rand(0, 100) . time() . '.' . $file->getClientOriginalExtension();
                    $url = $path . $name;
                    $file->move(public_path() . $this->dirname, $name);
                    $event->image_url = $url;
                }
            }
            $event->user_id = \Auth::user()->id;
            $event->save();
            return Redirect::route('admin.event');

        } catch (\Throwable$th) {
             return Redirect::route('admin.event');
        }
    }

    public function destroy(Event $event)
    {
       try {
        $event->delete();
        return Redirect::route('admin.event');
       } catch (\Throwable $th) {
        Redirect::back()
            ->withErrors(json_encode($th->getMessage()))
            ->withInput();
       }
    }
}
