<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView()
    {
        $allData = User::all();
        // $data['allData'] = User::all();
        return view('backend.user.view_user', compact('allData'));
    }

    public function AddUser()
    {
        return view('backend.user.add_user');
    }



    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([

            'email' => 'required|unique:users',
            'name' => 'required'

        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;

        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'تم التسجيل بنجاح',
            'alert-type' => 'info'
        );


        return redirect()->route('user.view')->with($notification);
    }


    public function EditUser($id)
    {
        $editdata = User::find($id);
        return view('backend.user.edit_user', compact('editdata'));
    }

    public function UpdateUser(Request $request, $id)
    {





        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;


        $data->save();

        $notification = array(
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('user.view')->with($notification);
    }

    public function DeleteUser($id)
    {

        $user = User::find($id);
        $user->delete();
        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }
}