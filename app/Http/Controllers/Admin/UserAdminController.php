<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Rules\UrlYt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Person;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $filter = ["q" => $request->q];
            return Inertia::render('Admin/Users/Index', [
                'filter' => $filter,
                'users' => User::with(['person'])->FilterAdmin($filter)->orderBy('created_at', 'desc')->paginate(env('PAGINATE')),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {   
        $user->person;
        return Inertia::render('Admin/Users/Edit', [
            "business_type" => business_type(),
            "user"=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'enabled' => ['required'],
            // 'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

            'surnames' => ['required', 'string', 'max:50'],
            'date_birth' => ['required'],
            'gender' => ['required', 'string', 'max:3'],
            'address' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'business_type' => ['required', 'string', 'max:100'],
        ])->validate();

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->enabled = $request->enabled;
            $user->save();

            Person::where("user_id","=",$user->id)->update([
                "surnames"=>$request->surnames,
                "date_birth"=>$request->date_birth,
                "gender"=>$request->gender,
                "address"=>$request->address,
                "country"=>$request->country,
                "district"=>$request->district,
                "phone"=>$request->phone,
                "country"=>$request->country,
                "business_type"=>$request->business_type

            ]);
            return Redirect::route($request->back);
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
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return Redirect::route('admin.user');
           } catch (\Throwable $th) {
            Redirect::back()
                ->withErrors(json_encode($th->getMessage()))
                ->withInput();
           }
    }
}
