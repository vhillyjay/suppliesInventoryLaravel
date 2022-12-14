<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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
        // $profile = User::all();
        // return Auth::user()->id;

        $profile = User::findOrFail(Auth::user()->id);
        if ($profile->image_path === NULL) {
            return view('profile.index', [
                'profile' => $profile,
            ]);
        }
        else {
            if (Storage::disk('local')->exists('public/img/profile/' . $profile->image_path)) {
                $imagePathFinder = Storage::disk('local')->path('public/img/profile/' . $profile->image_path);
                $profile = User::findOrFail(Auth::user()->id);
                return view('profile.index', [
                    'profile' => $profile,
                ]);
            } else {
                // return 'not found';
                return view('profile.index', [
                    'profile' => $profile,
                ])->with('notFound', 'Sorry. Image  ' . $profile->image_path . ' may not exist.');
            }
        }
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
    public function edit($id)
    {
        //
        $profile = User::findOrFail($id);
        if ($profile->id !== auth()->id()) {
            abort(403);
        }
        return view('profile.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'profileImage' => 'nullable|mimes:jpg,png,jpeg',
        ]);

        if ($request->profileImage === NULL) {
            // dd($request->all());
            $profile = User::findOrFail($id);
            $profile->name = $request->name;
            // $defaultImage = 'user.png';
            // $profile->image_path = $defaultImage;
            $profile->update();
            return redirect('/profile')
                ->with('profileUpdate', 'Profile successfully updated!');
        } else {
            $profileImageName = time() . '-' . $request->profileImage->getClientOriginalName();
            $profile = User::findOrFail($id);
            $updatedProfileImage = $request->file('profileImage')
                    ->storeAs('public/img/profile', $profileImageName);
            $publicPath = $request->profileImage
                ->move(public_path('img/profile'), $profileImageName);
            $profile->name = $request->name;
            // $profile->email = $request->email;
            $profile->image_path = $profileImageName;
            $profile->update();
            // dd($request->$profileImageName);
            return redirect('/profile')
                ->with('profileUpdate', 'Profile successfully updated!');
        }
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

    public function admindestroyusers($id)
    {
        // return 'destroy user ' . $id . ' using admin acc';
        $adminDestroy = User::findOrFail($id);
        $adminDestroy->delete();
        return redirect()->route('adminaccess.listofusers')
            ->with('userDeletion', 'User deleted!');
    }
}
