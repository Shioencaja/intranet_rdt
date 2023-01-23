<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeAdminController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/Home', [

            "users" => [
                "disabled" => user::where("enabled", "=", 0)->count(),
                "all" => user::count(),
            ],

        ]);
    }
}
