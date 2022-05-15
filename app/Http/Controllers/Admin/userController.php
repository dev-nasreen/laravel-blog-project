<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $users = User::paginate(2);

        return view('admin.users.index', compact('users'));
    }

    public function edit($user_id){
        $user = User::find($user_id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $req, $user_id){
        $user = User::find($user_id);

        if($user){
            $user->role_as = $req->role_as;
            $user->update();
            return redirect('admin/users')->with('message', 'Updated Successfully');
        }else{
            return redirect('admin/users')->with('message', 'no user found');
        }
       
    }
}
