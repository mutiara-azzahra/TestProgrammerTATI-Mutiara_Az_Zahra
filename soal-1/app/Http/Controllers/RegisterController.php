<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class RegisterController extends Controller
{

    public function index(){

        return view('register');

    }

    public function store(Request $request){

        $request -> validate([
            'username'      => 'required',
            'password'      => 'required',
        ]);

        $input['email']             = $request->email;
        $input['username']          = $request->username;
        $input['id_role']           = $request->id_role;
        $input['password']          = Hash::make($request->password);
        $input['created_by']        = $request->username;
        $input['updated_by']        = $request->username;

        $user                       = User::create($input);

        return redirect('login')->with('success','Lanjutkan login setelah data pegawai sudah diinput oleh Administrator!');

    }
}
