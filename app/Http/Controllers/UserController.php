<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Edit User Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        $user = Auth::user();
        //Get User Avatar Image
        if($user->avatar) {
            $image = $user->avatar;
        }
        else {
            $image = "/images/default_user.jpg";
        }
        return view('pages.profile', compact('user', 'image'));
    }

    /**
     * Save User Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;
        $user->about = $request->about;
        $user->save();

        return back()->with('status','Profile Updated Successfully');
    }


    /**
     * Ajax Image Upload Handling.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request)
    {
        $user = Auth::user();

        //Save new Image to DB and Move file to public folder
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path(). '/uploads/';

            //Check if file is a valid Image
            $image_extension = $image->getClientOriginalExtension();
            $allowedFileExtensions = ["jpg", "png", "gif", "jpeg"];
            if (in_array($image_extension, $allowedFileExtensions)) {
                $filename = time() . '.' . $image_extension;
                $image->move($destinationPath, $filename);

                // Delete old image from public folder before saving new one
                $old_image_path = public_path().$user->avatar;
                if (File::exists($old_image_path)) {
                    File::delete($old_image_path);
                }

                $user->avatar = '/uploads/'.$filename;
                $user->save();
                return response()->json(['success' => 'ok']);
            }
            
            return response()->json(['error' => 'ok']);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
