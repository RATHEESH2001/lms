<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
 public function getUserData(){

    $user = Auth::User();
    // dd($user);

    return view('profile', compact('user'));
 }

}
