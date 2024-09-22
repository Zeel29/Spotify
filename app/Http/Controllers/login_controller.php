<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;


class login_controller extends Controller
{
    //
    function index(Request $req)
    {
        $data = login::where('email', $req->user)->get();
        if ($data->isNotEmpty()) {
            if (Hash::check($req->password, $data[0]->password)) {
                if ($data[0]->role == 'user') {
                    $req->session()->put('user', $data[0]->name);
                    return redirect('welcome');
                } else if ($data[0]->role == 'admin') {
                    $req->session()->put('admin', 'Admin');
                    return redirect('admin');
                }
            } else {
                return redirect()->back()->withErrors(['failure' => 'Invalid email or password']);
            }
        } else {
            return redirect()->back()->withErrors(['failure' => 'Invalid email or password']);
        }
    }
    public function insert_data(Request $req)
    {
        if($req->password==$req->cpassword)
        {
            $info=new login;    
            $info->name=$req->user;
            $info->email=$req->userId;
            $info->password=Hash::make($req->password);
            $id=$info->save();
            if($id>0)
            {
                $req->session()->put('user',$req->user);
                return redirect('welcome');
            }
        }
        else
        {
            return redirect()->back()->withErrors(['failure' => 'Password and confirm password must be same']);
        }
    }

    public function logout()
    {
        if(session()->has('user'))
        {
             session()->pull('user');
        }
        return redirect('login');
    }

    public function logout_admin()
    {
        if(session()->has('admin'))
        {
             session()->pull('admin');
        }
        return redirect('login');
    }

    public function login_check()
    {
        if(session()->has('user'))
        {
            return redirect('welcome');
        }
        return view('login');
    }
    public function search()
    {
        $data=login::all();
        return view('user_info',['data'=>$data]);
    }


    public function showUserProfile()
    {
        // Check if user is logged in
        if (Session::has('user')) {
            // Assuming your login table has a 'name' field
            $login = login::where('name', Session::get('user'))->first();
            return view('wel2', compact('login'));
        } else {
            // Redirect to login page if user is not logged in
            return redirect('login')->withErrors(['failure' => 'Please log in to view your profile.']);
        }
    }

    public function l_delete($id)
    {
        $login = login::find($id);
        $login->delete();
        return redirect('login');
    }

    public function pro_edit($id)
    {
        $login = login::find($id);
        return view('editPro', ['login' => $login]);
    }
   
    public function u_update(Request $request)
    {
        $login = login::find($request->txtid);
        
        if(!$login) {
            return redirect()->back()->withErrors(['failure' => 'User not found']);
        }

        if($request->password == $request->cpassword)
        {
            // Update the existing record
            $login->name = $request->username;
            $login->email = $request->email;
            $login->password = Hash::make($request->password); // Hash the password
            $login->save();

            $request->session()->put('user', $login->name);
            return redirect('wel2');
        }
        else
        {
            return redirect()->back()->withErrors(['failure' => 'Password and confirm password must be same']);
        }
    }

}

