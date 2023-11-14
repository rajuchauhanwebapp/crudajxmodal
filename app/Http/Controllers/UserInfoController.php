<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Validator;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserInfoController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function user_list()
    {
        return response()->json([
            'user_list'=>UserInfo::all()
        ]);
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'=>'required|min:3',
            'email'=>'required|email',
            'dob'=>'required',
            'role'=>'required|min:3',
            'photo'=>'required|image|mimes:jpeg,jpg,png|max:500'],
            ['dob.required'=>'The Date Of Birth field is required.'
        ]);

        if ($validated->fails()) 
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validated->errors()
            ]);
        } 
        else 
        {
            $user = new UserInfo();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->role = $request->role;
            if ($request->hasFile('photo')) 
            {
                $file = $request->file('photo');
                $file_name = time().'.'.$file->extension();
                $file->move(public_path('profileimages'), $file_name);
                $user->photo = 'profileimages/'.$file_name;
            }
            $user->save();

            return response()->json([
                'status'=>200,
                'success'=>'Account Created Successfully!!'
            ]);
        }
    }

    public function edit($id)
    {
        return response()->json([
            'edit_user'=>UserInfo::find($id)
        ]);
    }

    public function update(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'=>'required|min:3',
            'email'=>'required|email',
            'dob'=>'required',
            'role'=>'required|min:3',
            'photo'=>'nullable'],
            ['dob.required'=>'The Date Of Birth field is required.'
        ]);

        if ($validated->fails()) 
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validated->errors()
            ]);
        } 
        else 
        {
            $user = UserInfo::find($request->userid);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->role = $request->role;
            if ($request->hasFile('photo')) 
            {
                $file = $request->file('photo');
                $file_name = time().'.'.$file->extension();
                $file->move(public_path('profileimages'), $file_name);
                $user->photo = 'profileimages/'.$file_name;
            }
            $user->save();

            return response()->json([
                'status'=>200,
                'success'=>'Account Updated Successfully!!'
            ]);
        }
    }

    public function delete($id)
    {
        $deleted_user = UserInfo::find($id)->delete();
        return response()->json([
            'status'=>200,
            'success'=>'User Deleted Successfully!!'
        ]);
    }
}
