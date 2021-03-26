<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    $data = Profile::all();

return view('admin.profile.profile',compact('data'));

}
