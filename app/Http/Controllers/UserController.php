<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Hash;
class UserController extends Controller
{
    public function getList(){
        $user = User::select('id', 'username', 'email', 'level', 'created_at')->OrderBy('id','DESC')->get();
        return view('admin.user.list',compact('user'));
    }
    public function getAdd(){
        return view('admin.user.create');
    }
    public function postAdd(UserRequest $request){
        $use = new User;
        $use->username = $request->txtuser;
        $use->password = Hash::make($request->txtpass);
        $use->email = $request->txtemail;
        $use->level = 2;
        $use->remember_token = $request->_token;
//        $use->status = $request->status;
        $use->save();
        return redirect()->route('admin.user.list')->with(['flash_type'=>'success','flash_msg'=>'Thêm User thành công!']);
    }
     public function getEdit(){

    }
    public function postEdit(){

    }
    public function getDelete(){

    }
}
