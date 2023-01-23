<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Event;
use App\Models\Marketing;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Mail\InscriptionEvent;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $tutorials = DB::table('lines')->where('line', 'like', '%' . $request->q . '%')->select('lines.line','lines.line as title','lines.id')->get();
        $dt['data']=$tutorials;
        $dt["route"]='tutorial';
        $dt["modulo"]='TUTORIALES';
        $dt["params"]=true;
        array_push($data,$dt);
       

        $events = Event::where('title', 'like', '%' . $request->q . '%')->select('title','events.id')->get();
        $dev['data']=$events;
        $dev["route"]='event.show';
        $dev["modulo"]='EVENTOS';
        $dt["params"]=false;
        
        array_push($data,$dev);


        $marks = Marketing::where('title', 'like', '%' . $request->q . '%')->where("alias_cate",["cp","red","red-video","poster","service"])->select('title','marketings.id')->get();
        
        $mark['data']=$marks;
        $mark["route"]='marketing.digital';
        $mark["modulo"]='HERRAMIENTAS DE MARKETING | DIGITALES';
        $mark["params"]=false;
        array_push($data,$mark);

        $marksAdvvv = Marketing::where('title', 'like', '%' . $request->q . '%')->where("alias_cate",["logo","other_logo","model","product","product-video","advertising"])
        ->select('title','marketings.id')->get();
        \Log::debug($marksAdvvv);
        $marka['data']=$marksAdvvv;
        $marka["route"]='marketing.advertising';
        $marka["modulo"]='HERRAMIENTAS DE MARKETING | PUBLICITARIAS';
        $marka["params"]=false;
        
        array_push($data,$marka);
        
        return Inertia::render('Dashboard/Search', [
            'data'=>$data,
            'total'=>count($tutorials) + count($events) + count($marksAdvvv) + count($marks) ,
            'q'=>$request->q
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
         $user = User::find(\Auth::user()->id);
         $user->person;
        return Inertia::render('Dashboard/Account/Edit', [
            "user"=>$user,
            "business_type"=>business_type()
        ]);
    }
    public function pass()
    {
         $user = User::find(\Auth::user()->id);
         $user->person;
        return Inertia::render('Dashboard/Account/Pass', [
            "user"=>$user,
            "business_type"=>business_type()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }

    public function sendInscription(User $user)
    {
        return \Mail::to('amadordev@gmail.com')->send(new InscriptionEvent($user));
    }
}
