<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contents = Storage::get('/storage/app/profilephoto/BdUymoZe7NusJ0SHtuoel8Qr10OSkrvz2ql95xm1.png');
        // if (Storage::disk('public')->exists('/storage/app/profilephoto/BdUymoZe7NusJ0SHtuoel8Qr10OSkrvz2ql95xm1.png')) {
        //     return "here";
        // }
        // else {
        //     return "nothere";
        // }
        return view('profile.index', ['contents' => $contents]);
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    // get / view / create method like
    public function changepassword()
    {
        return view('profile.changepassword');
    }

    // post / update method like
    public function updatepassword(Request $request)
    {
        // validation STEP1
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            // The field under validation must have a matching field of {field}_confirmation. For example, if the field under validation is password, a matching password_confirmation field must be present in the input.
        ]);
        // validating the input. if theres no data in the input(required), error will be shown 
        // dd($request->all());
        
        // match old pw STEP2 #Auth::user()->name# #auth()->user->password#
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            // dd('old password doesnt match');
            return back()->with('error', 'Doesnt match the old password. Please input the correct old password.');
        }
        // dd($request->all());
        // if old_password(input) doesnt match the pw in db error will show, else will match the pw in db

        // update new pw STEP3
        User::whereId(Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]));
        return back()->with('success', 'Password changed successfully!');
    }

    //upload file trial
    public function upload()
    {
        return view('profile.upload');
    }

    public function uploadimage(Request $request)
    {
        $path = $request->file('profilePhoto')->store('profilephoto');
        // return $path;
        dd($request->all());
    }
}
