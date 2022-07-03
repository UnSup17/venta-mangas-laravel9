<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Gender;

class GenderController extends Controller
{
    function list()
    {
        // $genders = DB::table('Gender')->select('*')->get();
        return view("home", ["genders" => Gender::all()]);
    }
}
