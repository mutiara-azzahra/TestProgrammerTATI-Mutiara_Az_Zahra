<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\MasterRole;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){

        $user = User::where('status', 'A')->get();

        return view('user.index', compact('user'));

    }

    public function create(){

        return view('user.create');
    }

    public function store(Request $request){

        $request -> validate([
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required',
            'id_role'       => 'required',
        ]);

        $input['username']      = $request->username;
        $input['email']         = $request->email;
        $input['password']      = Hash::make($request['password']);
        $input['id_role']       = $request->id_role; 
        $input['created_by']    = Auth::user()->username;
        $input['updated_by']    = Auth::user()->username;
        
        $user                   = User::create($input);

        return redirect()->route('user.index')->with('success','Akun baru berhasil ditambahkan!');
        
    }

    public function reset($id){

        $username  = User::where('id', $id)->value('username');

        User::where('id', $id)->update([
                'password'   => Hash::make(123456),
                'updated_by' => Auth::user()->username,
                'updated_at' => NOW()
            ]);

        return redirect()->route('user.index')->with('success','Password berhasil di reset menjadi 123456!');
        
    }

    public function nonaktif($id)
    {
        $nonaktif = User::where('id', $id)->update([
                'status'         => 'N',
                'updated_at'     => NOW(),
                'updated_by'     => Auth::user()->nama_user
            ]);

        if ($nonaktif){
            return redirect()->route('user.index')->with('success','Data user berhasil dinonaktifkan!');
        } else{
            return redirect()->route('user.index')->with('danger','Data user gagal dinonaktifkan');
        }
        
    }
    public function show($id)
    {
        $user = User::where('id', $id)->first();

        return view('profil.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('profil.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();

        $request->validate([
            'password'          => 'required',
        ]);

        $input['password']  = Hash::make($request['password']);

        $user->password = $input['password'];
            
        $user->update();

        return redirect()->route('user.show', ['id' => $id])->with('success','Password user berhasil diubah!');           
        
    }

}
